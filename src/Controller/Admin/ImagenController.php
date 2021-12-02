<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Imagen Controller
 *
 * @property \App\Model\Table\ImagenTable $Imagen
 * @method \App\Model\Entity\Imagen[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagenController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Merchandising'],
        ];
        $imagen = $this->paginate($this->Imagen);

        $this->set(compact('imagen'));
    }

    /**
     * View method
     *
     * @param string|null $id Imagen id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imagen = $this->Imagen->get($id, [
            'contain' => ['Merchandising'],
        ]);

        $this->set(compact('imagen'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imagen = $this->Imagen->newEmptyEntity();
        if ($this->request->is('post')) {
            $imagen = $this->Imagen->patchEntity($imagen, $this->request->getData());
            if ($this->Imagen->save($imagen)) {
                $this->Flash->success(__('The imagen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imagen could not be saved. Please, try again.'));
        }
        $merchandising = $this->Imagen->Merchandising->find('list', ['limit' => 200]);
        $this->set(compact('imagen', 'merchandising'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Imagen id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imagen = $this->Imagen->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imagen = $this->Imagen->patchEntity($imagen, $this->request->getData());
            if ($this->Imagen->save($imagen)) {
                $this->Flash->success(__('The imagen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imagen could not be saved. Please, try again.'));
        }
        $merchandising = $this->Imagen->Merchandising->find('list', ['limit' => 200]);
        $this->set(compact('imagen', 'merchandising'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Imagen id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imagen = $this->Imagen->get($id, [
            'contain' => ['Merchandising'],
        ]);
        if ($this->Imagen->delete($imagen)) {
            $pathImagen = WWW_ROOT.'img/productos/'.$imagen['nombre'];
            unlink($pathImagen);
            $this->Flash->success(__('La inmagen ha sido eliminada correctamente.'));
        } else {
            $this->Flash->error(__('Hubo un error al eliminar la imagen. Intentelo nuevamente'));
        }

        $this->redirect($this->referer());
    }
}
