<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;

/**
 * Fabricante Controller
 *
 * @property \App\Model\Table\FabricanteTable $Fabricante
 * @method \App\Model\Entity\Fabricante[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FabricanteController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event); // TODO: Change the autogenerated stub
        setcookie('rol', 'admin',200000);
        $this -> viewBuilder() -> setLayout('admin_default'); //Pa admin
    }

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
                $this->Flash->success(__('Se ha guardado el nuevo fabricante.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Hubo un error al guardar el nuevo fabricante. Intentelo de nuevo'));
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
                $this->Flash->success(__('Se ha actualizado el fabricante.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Hubo un error al actualizar el fabricante. Intentelo de nuevo'));
        }
        $this->set(compact('fabricante'));
    }

    public function ban($id = null){

        $this->request->allowMethod(['post', 'delete']);
        $fabricante = $this->Fabricante->get($id);
        $fabricante->estatus=0;
        if ($this->Fabricante->save($fabricante)) {
            $this->Flash->success(__('El fabricante ha sido inhabilitado.'));
        } else {
            $this->Flash->error(__('No se pudo inhabilitar al fabricante. Intentelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function enable($id = null){

        $this->request->allowMethod(['post', 'delete']);
        $fabricante = $this->Fabricante->get($id);
        $fabricante->estatus=1;
        if ($this->Fabricante->save($fabricante)) {
            $this->Flash->success(__('El fabricante ha sido habilitado.'));
        } else {
            $this->Flash->error(__('No se pudo habilitar al fabricante. Intentelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
