<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Categoria Controller
 *
 * @property \App\Model\Table\CategoriaTable $Categoria
 * @method \App\Model\Entity\Categorium[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $categoria = $this->paginate($this->Categoria);

        $this->set(compact('categoria'));
    }

    /**
     * View method
     *
     * @param string|null $id Categorium id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categorium = $this->Categoria->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('categorium'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categorium = $this->Categoria->newEmptyEntity();
        if ($this->request->is('post')) {
            $categorium = $this->Categoria->patchEntity($categorium, $this->request->getData());
            if ($this->Categoria->save($categorium)) {
                $this->Flash->success(__('Nueva categoría guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guadar la nueva categoría. Intentelo de nuevo.'));
        }
        $this->set(compact('categorium'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Categorium id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categorium = $this->Categoria->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categorium = $this->Categoria->patchEntity($categorium, $this->request->getData());
            if ($this->Categoria->save($categorium)) {
                $this->Flash->success(__('La categoría ha sido actualizada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar la categoría. Intentelo de nuevo.'));
        }
        $this->set(compact('categorium'));
    }

    public function ban($id = null){

        $this->request->allowMethod(['post', 'delete']);
        $categorium = $this->Categoria->get($id);
        $categorium->estatus=0;
        if ($this->Categoria->save($categorium)) {
            $this->Flash->success(__('La categoría ha sido inhabilitada.'));
        } else {
            $this->Flash->error(__('No se pudo inhabilitar la categoría. Intentelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function enable($id = null){

        $this->request->allowMethod(['post', 'delete']);
        $categorium = $this->Categoria->get($id);
        $categorium->estatus=1;
        if ($this->Categoria->save($categorium)) {
            $this->Flash->success(__('La categoría ha sido inhabilitada.'));
        } else {
            $this->Flash->error(__('No se pudo inhabilitar la categoría. Intentelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
