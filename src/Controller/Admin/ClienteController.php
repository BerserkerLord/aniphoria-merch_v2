<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

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

        $this->Authentication->allowUnauthenticated(['login']);
    }

    public function login()
    {
        setcookie('rol', 'cliente');
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/cliente/add';
            return $this->redirect($target);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Correo o contraseña inválidos');
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['prefix' => 'Cliente', 'controller' => 'cliente', 'action' => 'login']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cliente = $this->paginate($this->Cliente);

        $this->set(compact('cliente'));
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
            'contain' => [],
        ]);

        $this->set(compact('cliente'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Cliente->newEmptyEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Cliente->patchEntity($cliente, $this->request->getData());
            $cliente->token=MD5(rand(1,9999).'');
            $cliente->verificado=false;
            $cliente->fecha_registro=date("Y-m-d");
            $cliente->contrasenia=MD5($this->request->getData('contrasenia'));
            $this->addPhoto($cliente);
            if ($this->Cliente->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $this->set(compact('cliente'));
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
        $validado=$cliente->verificado;
        $registro=$cliente->echa_registro;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nombrePhoto=$cliente->foto;
            $cliente = $this->Cliente->patchEntity($cliente, $this->request->getData(), ['validate' => false]);
            $contrasena = $this->request->getData('contrasenia');
            $cliente->contrasenia=$contrasena;
            $cliente->verificado=$validado;
            $cliente->fecha_registro=$registro;
            $this->changePhoto($cliente, $nombrePhoto);
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
        $imgpath=WWW_ROOT.'img'.DS.'clientes'.DS.$cliente->foto;
        if ($this->Cliente->delete($cliente)) {
            if(!empty($cliente->foto)){
                unlink($imgpath);
            }
            $this->Flash->success(__('The cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function addPhoto($cliente){
        if(!$cliente->getErrors){
            $image=$this->request->getData('imagen');
            $nombre=$image->getClientFilename();
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
                if(!empty($administrador->foto)){
                    unlink($imgpath);
                }
                $cliente->foto=$nombre;
            }
            else{
                $cliente->foto=$anterior;
            }
        }
    }
}
