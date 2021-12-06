<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 */
/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    // Register scoped middleware for in scopes.
    $builder->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true,
    ]));
    $builder->applyMiddleware('csrf');

    /*
     * Rutas base "/"
     */
    $builder->connect('/', ['controller' => 'Pages', 'action' => 'index'], ['_name' => 'index']);
    $builder -> connect('/admin', ['controller' => 'Pages', 'action' => 'admindex']);
    $builder -> connect('/about', ['controller' => 'Pages', 'action' => 'about'], ['_name' => 'about']);
    $builder -> connect('/contact', ['controller' => 'Pages', 'action' => 'contact'], ['_name' => 'contact']);
    /*
     * Páginas estáticas
     */


    /*
     * Connect catchall routes for all controllers.
     *
     * The `fallbacks` method is a shortcut for
     *
     * ```
     * $builder->connect('/:controller', ['action' => 'index']);
     * $builder->connect('/:controller/:action/*', []);
     * ```
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $builder->fallbacks();
});

/*
 * Rutas para administrador
 */
$routes->prefix('Admin', function (RouteBuilder $routes) {
    $routes -> connect('/login', ['controller' => 'administrador', 'action' => 'login'], ['_name' => 'loginAdmin']);
    $routes -> connect('/categories', ['controller' => 'categoria', 'action' => 'index'], ['_name' => 'viewCategories']);
    $routes -> connect('/clients', ['controller' => 'cliente', 'action' => 'index'], ['_name' => 'viewClients']);
    $routes -> connect('/compra', ['controller' => 'compra', 'action' => 'index'], ['_name' => 'viewCompras']);
    $routes -> connect('/pedido', ['controller' => 'pedido', 'action' => 'index'], ['_name' => 'viewPedidos']);
    $routes -> connect('/merch', ['controller' => 'merchandising', 'action' => 'index'], ['_name' => 'viewMerchandising']);
    $routes -> connect('/manufacturer', ['controller' => 'fabricante', 'action' => 'index'], ['_name' => 'viewManufacturers']);
    $routes -> connect('/direcciones', ['controller' => 'direccion', 'action' => 'index'], ['_name' => 'viewAddresses']);
    $routes -> connect('/admins', ['controller' => 'administrador', 'action' => 'index'], ['_name' => 'viewAdmins']);
    $routes -> connect('/comentario', ['controller' => 'comentario', 'action' => 'index'], ['_name' => 'viewComentarios']);
    $routes -> connect('/cupones', ['controller' => 'cupon', 'action' => 'index'], ['_name' => 'viewCupones']);
    $routes -> connect('/logout', ['controller' => 'administrador', 'action' => 'logout'], ['_name' => 'logoutAdmin']);
    $routes -> connect('/dashboard', ['controller' => 'dashboard', 'action' => 'index'], ['_name' => 'dashAdmin']);
    $routes -> fallbacks(DashedRoute::class);
});

/*
 * Rutas para Cliente
 */
$routes->prefix('Cliente', function (RouteBuilder $routes) {
    $routes -> connect('/login', ['controller' => 'cliente', 'action' => 'login'], ['_name' => 'loginClient']);
    $routes -> connect('/view/{1}', ['controller' => 'cliente', 'action' => 'view'], ['_name' => 'viewCliente']);
    $routes -> connect('/logout', ['controller' => 'cliente', 'action' => 'logout'], ['_name' => 'logoutClient']);
    $routes -> connect('/merch', ['controller' => 'merchandising', 'action' => 'index'], ['_name' => 'viewMerchandisingClient']);
    $routes -> connect('/cart', ['controller' => 'merchandising', 'action' => 'cart'], ['_name' => 'shoppingCart']);
    $routes -> connect('/pedidos', ['controller' => 'pedido', 'action' => 'index'], ['_name' => 'viewPedidosClient']);
    $routes -> connect('/direcciones', ['controller' => 'direccion', 'action' => 'index'], ['_name' => 'viewAdressesClient']);
    $routes -> fallbacks(DashedRoute::class);
});

/*
 * Rutas para acceder a la API
 */
$routes -> prefix('Api', function (RouteBuilder $routes) {
    $routes -> setExtensions('json');
    $routes -> connect('/view/{id}', ['controller' => 'api', 'action' => 'view']) -> setPass(['id']) -> setPatterns(['id' => '[0-9]+']);
    $routes -> connect('/login', ['controller' => 'api', 'action' => 'login']);
    $routes -> connect('/edit/{id}', ['controller' => 'api', 'action' => 'edit']) -> setPass(['id']) -> setPatterns(['id' => '[0-9]+']);
    $routes -> fallbacks(DashedRoute::class);
});


