<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.3.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App;

use App\Model\Entity\Cliente;
use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Http\MiddlewareQueue;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Identifier\IdentifierInterface;
use Authentication\Middleware\AuthenticationMiddleware;
use Cake\Routing\Router;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 */
class Application extends BaseApplication implements AuthenticationServiceProviderInterface
{
    /**
     * Load all the application configuration and bootstrap logic.
     *
     * @return void
     */
    public function bootstrap(): void
    {
        // Call parent to load bootstrap from files.
        parent::bootstrap();

        if (PHP_SAPI === 'cli') {
            $this->bootstrapCli();
        }

        if (Configure::read('debug')) {
            $this->addPlugin('DebugKit');
        }

        $this -> addPlugin('Authentication');
    }

    /**
     * Setup the middleware queue your application will use.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        $middlewareQueue
            // Catch any exceptions in the lower layers,
            // and make an error page/response
            ->add(new ErrorHandlerMiddleware(Configure::read('Error')))

            // Handle plugin/theme template_assets like CakePHP normally does.
            ->add(new AssetMiddleware([
                'cacheTime' => Configure::read('Asset.cacheTime'),
            ]))

            -> add(new AssetMiddleware())
            -> add(new RoutingMiddleware($this))
            -> add(new BodyParserMiddleware())
            -> add(new AuthenticationMiddleware($this));

        return $middlewareQueue;
    }

    /**
     * Bootrapping for CLI application.
     *
     * That is when running commands.
     *
     * @return void
     */
    protected function bootstrapCli(): void
    {
        try {
            $this->addPlugin('Bake');
        } catch (MissingPluginException $e) {
            // Do not halt if the plugin is missing
        }

        $this->addPlugin('Migrations');

        // Load more plugins here
    }

    public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $rout = 'loginClient';
        $pref = 'Cliente';
        $mod = 'Cliente';
        if(isset($_COOKIE['rol'])){
            if($_COOKIE['rol'] == 'admin'){
                $rout = 'loginAdmin';
                $pref = 'Admin';
                $mod = 'Administrador';
            }
        }
        $service = new AuthenticationService();
        // Define where users should be redirected to when they are not authenticated
        $service->setConfig([
            'unauthenticatedRedirect' => Router::url(['_name' => $rout, 'prefix' => $pref]),
            'queryParam' => 'redirect',
        ]);

        $fields = [
            IdentifierInterface::CREDENTIAL_USERNAME => 'email',
            IdentifierInterface::CREDENTIAL_PASSWORD => 'password'
        ];
        // Load the authenticators. Session should be first.
        $service->loadAuthenticator('Authentication.Session');
        $service->loadAuthenticator('Authentication.Form', [
            'fields' => $fields,
            'loginUrl' => Router::url(['_name' => $rout, 'prefix' => $pref]),
        ]);

        // Load identifiers
        $service->loadIdentifier('Authentication.Password', ['fields' => [
            'username' => 'correo',
            'password' => 'contrasenia',
        ],
            'resolver' => [
                'className' => 'Authentication.Orm',
                'userModel' => $mod
            ],
            'passwordHasher' => [
                'className' => 'Authentication.Fallback',
                'hashers' => [
                    'Authentication.Default',
                    [
                        'className' => 'Authentication.Legacy',
                        'hashType' => 'md5',
                        'salt' => false // turn off default usage of salt
                    ],
                ]
            ]
        ]);
        return $service;
    }
}
