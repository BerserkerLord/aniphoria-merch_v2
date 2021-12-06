<?php
declare(strict_types=1);
namespace App\Controller\Cliente;

use App\Controller\AppController;
use Cake\Event\EventInterface;
require_once 'cart.php';
/**
 * Cliente Controller
 *
 * @property \App\Model\Table\ClienteTable $Cliente
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClienteController extends AppController
{

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this -> viewBuilder() -> setLayout('client_default');
        $this->Authentication->allowUnauthenticated(['login', 'add']);
    }

    public function login()
    {
        setcookie('rol', 'cliente', 2147483647);
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $_SESSION['e'] = 1;
            return $this -> redirect(['_name' => 'index']);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Correo o contraseña inválidos');
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        $_SESSION['e'] = 0;
        return $this->redirect(['_name' => 'index']);
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Cliente->get($id, [
            'contain' => ['Pedido' => ['Merchandising'], 'Direccion'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $nombrePhoto=$cliente->foto;
            $cliente = $this->Cliente->patchEntity($cliente, $this->request->getData());
            /*$contrasena = $this->request->getData('contrasenia');
            $cliente->contrasenia=$contrasena;
            $cliente->verificado=$validado;
            $cliente->fecha_registro=$registro;*/
            $this->changePhoto($cliente, $nombrePhoto);
            if ($this->Cliente->save($cliente)) {
                $this->Flash->success(__('El cliente ha sido actualizado'));

                return $this->redirect(['action' => 'view', $_SESSION['Auth']['id']]);
            }
            $this->Flash->error(__('No se pudo actualizar el cliente. Intentelo de nuevo.'));
        }

        $this->set(compact('cliente'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this -> Cliente -> newEmptyEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Cliente->patchEntity($cliente, $this->request->getData());
            $cliente->token=MD5(rand(1,9999).'');
            $cliente->verificado=false;
            $cliente->fecha_registro=date("Y-m-d");
            $this->addPhoto($cliente);
            $cliente->contrasenia=MD5($this->request->getData('contrasenia'));
            if ($this->Cliente->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['prefix' => '', '_name' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $this->set(compact('cliente'));
    }

    public function addPhoto($cliente){
        if(!$cliente->getErrors){
            $image=$this->request->getData('imagen');
            $nombre=MD5($image->getClientFilename().rand(1,10000)).'jpg';
            $path=WWW_ROOT.'img'.DS.'clientes'.DS.$nombre;
            if($nombre){
                $image->moveTo($path);
                $cliente->foto=$nombre;
            }
        }
    }

    public function changePhoto($cliente, $anterior){
        if (!$cliente->getErrors) {
            $image = $this->request->getData('imagen');
            $nombre = $image->getClientFilename();
            if ($nombre){
                $path=WWW_ROOT.'img'.DS.'clientes'.DS.$nombre;
                $image->moveTo($path);
                $imgpath=WWW_ROOT.'img'.DS.'clientes'.DS.$anterior;
                if(!empty($anterior) && file_exists($imgpath)){
                    unlink($imgpath);
                }
                $cliente->foto=$nombre;
            }
            else{
                $cliente->foto=$anterior;
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Cliente->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Cliente->patchEntity($cliente, $this->request->getData());
            if ($this->Cliente->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $this->set(compact('cliente'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Cliente->get($id);
        if ($this->Cliente->delete($cliente)) {
            $this->Flash->success(__('The cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


}
