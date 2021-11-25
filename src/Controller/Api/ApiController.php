<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;
use App\Model\Table\ClienteTable;
use Cake\Event\EventInterface;
use PHPUnit\Util\Json;
use Cake\ORM\Locator\LocatorAwareTrait;

/**
 * Api Controller
 * @method \App\Model\Entity\Api[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class ApiController extends AppController
{

    /**
     * @var \Cake\Datasource\RepositoryInterface|null
     *
     */

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this -> Authentication-> allowUnauthenticated(['login', 'add', 'view', 'edit', 'delete']);
    }


    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function view($id)
    {
        $this -> Cliente = new ClienteTable();
        $cliente = $this -> Cliente -> get($id);
        $this->set('cliente', $cliente);
        $this->viewBuilder()->setOption('serialize', ['cliente']);
    }

    public function login()
    {
        $this -> Cliente = new ClienteTable();
        $clienteValidation = $this->getTableLocator()->get('cliente');
        $this -> request -> allowMethod('post');
        $data = $this -> request -> getData();
        $query = $clienteValidation->find()->select('id')->where(['correo' => $data['correo'], 'AND' => ['contrasenia' => $data['contrasenia']]])->count();
        if($query == 1){
            $id = $clienteValidation->find()->select('id')->where(['correo' => $data['correo'], 'AND' => ['contrasenia' => $data['contrasenia']]])->execute()->fetch('assoc');
            $cliente = $this -> Cliente -> get($id['cliente__id'], ['contain' => ['Pedido' => ['Merchandising'], 'Direccion']]);
            $this -> set(['status' => $query,
                'cliente' => $cliente]);
            $this->viewBuilder()->setOption('serialize', ['status', 'cliente']);
        } else {
            $this -> set(['status' => $query]);
            $this->viewBuilder()->setOption('serialize', ['status']);
        }
    }

    public function edit($id)
    {
        $this -> Cliente = new ClienteTable();
        $this->request->allowMethod(['patch', 'post', 'put']);
        $cliente = $this->Cliente->get($id);
        $cliente = $this->Cliente->patchEntity($cliente, $this->request->getData());
        if(!empty($this->request->getData('contrasenia'))){
            $cliente->contrasenia=$this->request->getData('contrasenia');
        }
        if ($this->Cliente->save($cliente)) {
            $message = 'Guardado';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'cliente' => $cliente,
        ]);
        $this->viewBuilder()->setOption('serialize', ['cliente', 'message']);
    }

    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $recipe = $this->Recipes->newEntity($this->request->getData());
        if ($this->Recipes->save($recipe)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'recipe' => $recipe,
        ]);
        $this->viewBuilder()->setOption('serialize', ['recipe', 'message']);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['delete']);
        $recipe = $this->Recipes->get($id);
        $message = 'Deleted';
        if (!$this->Recipes->delete($recipe)) {
            $message = 'Error';
        }
        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}
