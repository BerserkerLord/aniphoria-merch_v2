<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\ORM\Locator\LocatorAwareTrait;
use App\Controller\AppController;

/**
 * Cupon Controller
 *
 * @property \App\Model\Table\CuponTable $Cupon
 * @method \App\Model\Entity\Cupon[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CuponController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cupon = $this->paginate($this->Cupon);

        $this->set(compact('cupon'));
    }

    /**
     * View method
     *
     * @param string|null $id Cupon id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cupon = $this->Cupon->get($id, [
            'contain' => ['Pedido'],
        ]);

        $this->set(compact('cupon'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cupones = $this->getTableLocator()->get('cupon');
        $cupon = $this->Cupon->newEmptyEntity();
        if ($this->request->is('post')) {
            do{
                $code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);
                $query = $cupones->find()->select('codigo')->where(['codigo' => $code])->count();
            } while($query!=0);
            $cupon = $this->Cupon->patchEntity($cupon, $this->request->getData());
            $cupon->codigo=$code;
            $cupon->fecha_lanzamiento=date("Y-m-d");
            if ($this->Cupon->save($cupon)) {
                $this->Flash->success(__('The cupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cupon could not be saved. Please, try again.'));
        }
        $this->set(compact('cupon'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cupon id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cupon = $this->Cupon->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cupon = $this->Cupon->patchEntity($cupon, $this->request->getData());
            if ($this->Cupon->save($cupon)) {
                $this->Flash->success(__('The cupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cupon could not be saved. Please, try again.'));
        }
        $this->set(compact('cupon'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cupon id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cupon = $this->Cupon->get($id);
        if ($this->Cupon->delete($cupon)) {
            $this->Flash->success(__('The cupon has been deleted.'));
        } else {
            $this->Flash->error(__('The cupon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
