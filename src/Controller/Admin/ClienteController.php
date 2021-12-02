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
                $this->Flash->success(__('Nuevo cliente guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guadar el nuevo cliente. Intentelo de nuevo.'));
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

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el cliente. Intentelo de nuevo.'));
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
            $this->Flash->success(__('El cliente ha sido eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el cliente. Intentelo de nuevo.'));
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

    public function ban($id = null){

        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Cliente->get($id);
        $cliente->estatus=0;
        if ($this->Cliente->save($cliente)) {
            $this->Flash->success(__('La categoría ha sido inhabilitada.'));
        } else {
            $this->Flash->error(__('No se pudo inhabilitar la categoría. Intentelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function enable($id = null){

        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Cliente->get($id);
        $cliente->estatus=1;
        if ($this->Cliente->save($cliente)) {
            $this->Flash->success(__('La categoría ha sido inhabilitada.'));
        } else {
            $this->Flash->error(__('No se pudo inhabilitar la categoría. Intentelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
