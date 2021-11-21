<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Fabricante Controller
 *
 * @property \App\Model\Table\FabricanteTable $Fabricante
 * @method \App\Model\Entity\Fabricante[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FabricanteController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $fabricante = $this->paginate($this->Fabricante);

        $this->set(compact('fabricante'));
    }

    /**
     * View method
     *
     * @param string|null $id Fabricante id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fabricante = $this->Fabricante->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('fabricante'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fabricante = $this->Fabricante->newEmptyEntity();
        if ($this->request->is('post')) {
            $fabricante = $this->Fabricante->patchEntity($fabricante, $this->request->getData());
            if ($this->Fabricante->save($fabricante)) {
                $this->Flash->success(__('The fabricante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fabricante could not be saved. Please, try again.'));
        }
        $this->set(compact('fabricante'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fabricante id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fabricante = $this->Fabricante->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fabricante = $this->Fabricante->patchEntity($fabricante, $this->request->getData());
            if ($this->Fabricante->save($fabricante)) {
                $this->Flash->success(__('The fabricante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fabricante could not be saved. Please, try again.'));
        }
        $this->set(compact('fabricante'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fabricante id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fabricante = $this->Fabricante->get($id);
        if ($this->Fabricante->delete($fabricante)) {
            $this->Flash->success(__('The fabricante has been deleted.'));
        } else {
            $this->Flash->error(__('The fabricante could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
