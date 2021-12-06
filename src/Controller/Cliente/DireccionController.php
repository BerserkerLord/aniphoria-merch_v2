<?php
declare(strict_types=1);

namespace App\Controller\Cliente;

use App\Controller\AppController;
use Cake\Event\EventInterface;

/**
 * Direccion Controller
 *
 * @property \App\Model\Table\DireccionTable $Direccion
 * @method \App\Model\Entity\Direccion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DireccionController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this -> viewBuilder() -> setLayout('client_default');
        $this->Authentication->allowUnauthenticated(['login', 'add']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Direccion->find('all')->where(['Cliente.id' => $_SESSION['Auth']['id']])->contain(['Cliente']);

        $direccion = $this->paginate($query);

        $this->set(compact('direccion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $direccion = $this->Direccion->newEmptyEntity();
        $direccion->cliente_id=$_SESSION['Auth']['id'];
        if ($this->request->is('post')) {
            $direccion = $this->Direccion->patchEntity($direccion, $this->request->getData());
            if ($this->Direccion->save($direccion)) {
                $this->Flash->success(__('La dirección ha sido registrada correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Hubo un error al registrar la dirección. Intentelo nuevamente'));
        }
        $cliente = $this->Direccion->Cliente->find('list', ['limit' => 200]);
        $this->set(compact('direccion', 'cliente'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Direccion id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $direccion = $this->Direccion->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $direccion = $this->Direccion->patchEntity($direccion, $this->request->getData());
            $direccion->cliente_id=$_SESSION['Auth']['id'];
            if ($this->Direccion->save($direccion)) {
                $this->Flash->success(__('La se ha actualizado correctamente'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Hubo un error al actualizar la dirección. Intentelo nuevamente.'));
        }
        $cliente = $this->Direccion->Cliente->find('list', ['limit' => 200]);
        $this->set(compact('direccion', 'cliente'));
    }

    public function ban($id = null){

        $this->request->allowMethod(['post', 'delete']);
        $direccion = $this->Direccion->get($id);
        $direccion->estatus=0;
        if ($this->Direccion->save($direccion)) {
            $this->Flash->success(__('La dirección ha sido inhabilitada.'));
        } else {
            $this->Flash->error(__('No se pudo inhabilitar la dirección. Intentelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function enable($id = null){

        $this->request->allowMethod(['post', 'delete']);
        $direccion = $this->Direccion->get($id);
        $direccion->estatus=1;
        if ($this->Direccion->save($direccion)) {
            $this->Flash->success(__('La dirección ha sido habilitada.'));
        } else {
            $this->Flash->error(__('No se pudo habilitar la dirección. Intentelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
