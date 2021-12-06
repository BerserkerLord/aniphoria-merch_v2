<?php
declare(strict_types=1);

namespace App\Controller\Admin;
use Cake\Event\EventInterface;

use App\Controller\AppController;

/**
 * Administrador Controller
 *
 * @property \App\Model\Table\AdministradorTable $Administrador
 * @method \App\Model\Entity\Administrador[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdministradorController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        setcookie('rol', 'admin',200000);
        $this->Authentication->allowUnauthenticated(['login']);
        $this -> viewBuilder() -> setLayout('admin_default'); //Pa admin
    }

    public function login()
    {
        setcookie('rol', 'administrador');
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/admin/';
            return $this->redirect($target);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Correo o contraseña inválidos');
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $administrador = $this->paginate($this->Administrador);

        $this->set(compact('administrador'));
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['_name' => 'index']);
    }

    /**
     * View method
     *
     * @param string|null $id Administrador id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $administrador = $this->Administrador->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('administrador'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $administrador = $this->Administrador->newEmptyEntity();
        if ($this->request->is('post')) {
            $administrador = $this->Administrador->patchEntity($administrador, $this->request->getData());
            $administrador->token=MD5(rand(1,9999).'');
            $administrador->contrasenia=MD5($this->request->getData('contrasenia'));
            $this->addPhoto($administrador);
            if ($this->Administrador->save($administrador)) {
                $this->Flash->success(__('Nuevo administrador guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guadar el nuevo administrador. Intentelo de nuevo.'));
        }
        $this->set(compact('administrador'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Administrador id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $administrador = $this->Administrador->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nombrePhoto=$administrador->foto;
            $administrador = $this->Administrador->patchEntity($administrador, $this->request->getData());
            //$administrador->contrasenia=MD5($this->request->getData('contrasenia'));
            $this->changePhoto($administrador, $nombrePhoto);
            if ($this->Administrador->save($administrador)) {
                $this->Flash->success(__('El administrador ha sido actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el administrador. Intentelo de nuevo.'));
        }
        $this->set(compact('administrador'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Administrador id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $administrador = $this->Administrador->get($id);
        $imgpath=WWW_ROOT.'img'.DS.'admins'.DS.$administrador->foto;

        if ($this->Administrador->delete($administrador)) {
            if(!empty($administrador->foto && file_exists($administrador->foto))){
                unlink($imgpath);
            }
            $this->Flash->success(__('El administrador ha sido eliminado.'));
        }
        else {
            $this->Flash->error(__('No se pudo eliminar el administrador. Intentelo de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function addPhoto($administrador){
        if(!$administrador->getErrors){
            $image=$this->request->getData('imagen');
            $nombre=MD5($image->getClientFilename()).'jpg';
            $path=WWW_ROOT.'img'.DS.'admins'.DS.$nombre;
            if($nombre){
                $image->moveTo($path);
                $administrador->foto=$nombre;
            }
        }
    }

    public function changePhoto($administrador, $anterior){
        if (!$administrador->getErrors) {
            $image = $this->request->getData('imagen');
            $nombre = $image->getClientFilename();
            if ($nombre){
                $path=WWW_ROOT.'img'.DS.'admins'.DS.$nombre;
                $image->moveTo($path);
                $imgpath=WWW_ROOT.'img'.DS.'admins'.DS.$anterior;
                if(!empty($administrador->foto)){
                    unlink($imgpath);
                }
                $administrador->foto=$nombre;
            }
            else{
                $administrador->foto=$anterior;
            }
        }
    }
}
