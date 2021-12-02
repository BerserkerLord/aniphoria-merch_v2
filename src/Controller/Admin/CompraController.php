<?php
declare(strict_types=1);

namespace App\Controller\Admin;
use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;

/**
 * Compra Controller
 *
 * @property \App\Model\Table\CompraTable $Compra
 * @method \App\Model\Entity\Compra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompraController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Estatus', 'Fabricante', 'Merchandising'],
        ];
        $compra = $this->paginate($this->Compra);

        $this->set(compact('compra'));
    }

    /**
     * View method
     *
     * @param string|null $id Compra id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $compra = $this->Compra->get($id, [
            'contain' => ['Estatus', 'Fabricante', 'Merchandising' => ['Categoria']],
        ]);

        $this->set(compact('compra'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $id = 5;
        $compra = $this->Compra->newEmptyEntity();
        if ($this->request->is('post')) {
            $compra = $this->Compra->patchEntity($compra, $this->request->getData());
            if ($this->Compra->save($compra)) {
                $this->Flash->success(__('The compra has been saved.'));
                setcookie('compra', json_encode($compra -> toArray()), time()+60);
                return $this->redirect(['action' => 'cantidad']);
                //return $this->redirect(['action' => 'cantidad', $compra]);
            }
            else{
                $this->Flash->error(__('No se pudo guadar la nueva compra. Intentelo de nuevo.'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $estatus = $this->Compra->Estatus->find('list', ['limit' => 200]);
        $fabricante = $this->Compra->Fabricante->find('list', ['limit' => 200]);
        $merchandising = $this->Compra->Merchandising->find('list', ['limit' => 200]);
        $this->set(compact('compra', 'estatus', 'fabricante', 'merchandising'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Compra id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $compra = $this->Compra->get($id, [
            'contain' => ['Merchandising'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $compra = $this->Compra->patchEntity($compra, $this->request->getData());
            if ($this->Compra->save($compra)) {
                $this->Flash->success(__('El estatús de la compra ha sido cambiado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se puede cambiar el estatús de la compra. Intentelo de nuevo.'));
        }
        $estatus = $this->Compra->Estatus->find('list', ['limit' => 200]);
        $fabricante = $this->Compra->Fabricante->find('list', ['limit' => 200]);
        $merchandising = $this->Compra->Merchandising->find('list', ['limit' => 200]);
        $this->set(compact('compra', 'estatus', 'fabricante', 'merchandising'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Compra id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $compra = $this->Compra->get($id);
        if ($this->Compra->delete($compra)) {
            $this->Flash->success(__('La compra ha sido eliminada.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar la compra. Intentelo de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function factura($id = null)
    {
        $compra = $this->Compra->get($id, [
            'contain' => ['Estatus', 'Fabricante', 'Merchandising'],
        ]);
        $this->viewBuilder()->setClassName('CakePdf.Pdf');
        $this->viewBuilder()->setOption(
            'pdfConfig',
            [
                'orientation' => 'portrait',
                'filename' => 'Factura_Compra' . $id.'.pdf'
            ]
        );

        $this->set('compra', $compra);
    }

    public function cantidad(){
        if ($this->request->is('post')) {
            $conn = ConnectionManager::get('default');
            $compra = json_decode($_COOKIE['compra'], true);
            $count = 0;
            $good = true;
            foreach(json_decode($_COOKIE['compra'], true)['merchandising'] as $compra):
                if(!$conn -> execute('UPDATE compra_merchandising SET cantidad = :can WHERE compra_id = :com_id AND merchandising_id = :mer_id', ['can' => $this->request->getData()[$count], 'com_id' => json_decode($_COOKIE['compra'], true)['id'], 'mer_id' => $compra['id']])){
                    $good = false;
                }
                $count++;
            endforeach;
            if($good){
                $this->Flash->success(__('Se han agregado las cantidades.'));
            }
            else{
                $conn -> execute('DELETE FROM compra_merchandising WHERE compra_id = :com_id', ['com_id' => json_decode($_COOKIE['compra'], true)['id']]);
                $this->Flash->success(__('No se pudieron agregar las cantidades. Intentelo de nuevo.'));
            }
            return $this->redirect(['action' => 'index']);
            /*$cantidades = $this->getTableLocator()->get('CompraMerchandising');
            $query = $cantidades->query();
            $count = 0;
            foreach (json_decode($_COOKIE['compra'], true)['merchandising'] as $compra):
                echo '<pre>';
                debug($query->update()->set(['cantidad' => $this->request->getData()[$count]])->where(['AND' => [
                    'compra_id' => json_decode($_COOKIE['compra'], true)['id'],
                    'merchandising_id' => $compra['id']
                ]])->execute());
                echo '</pre>';
                $count++;
            endforeach;*/

        }
    }
}
