<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Direccion Controller
 *
 * @property \App\Model\Table\DireccionTable $Direccion
 * @method \App\Model\Entity\Direccion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DireccionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cliente'],
        ];
        $direccion = $this->paginate($this->Direccion);

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
            if ($this->Direccion->save($direccion)) {
                $this->Flash->success(__('La se ha actualizado correctamente'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Hubo un error al actualizar la dirección. Intentelo nuevamente.'));
        }
        $cliente = $this->Direccion->Cliente->find('list', ['limit' => 200]);
        $this->set(compact('direccion', 'cliente'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Direccion id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $direccion = $this->Direccion->get($id);
        if ($this->Direccion->delete($direccion)) {
            $this->Flash->success(__('La dirección ha sido eliminada correctamente.'));
        } else {
            $this->Flash->error(__('Hubo un error al eliminar la dirección. Intentelo nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
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
