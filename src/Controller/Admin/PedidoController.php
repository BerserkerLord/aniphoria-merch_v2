<?php
declare(strict_types=1);

namespace App\Controller\Admin;
use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;

/**
 * Pedido Controller
 *
 * @property \App\Model\Table\PedidoTable $Pedido
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Estatus', 'Cliente', 'Direccion', 'Cupon', 'Merchandising'],
        ];
        $pedido = $this->paginate($this->Pedido);

        $this->set(compact('pedido'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedido = $this->Pedido->get($id, [
            'contain' => ['Estatus', 'Cliente', 'Direccion', 'Cupon', 'Merchandising' => ['Categoria']],
        ]);

        $this->set(compact('pedido'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedido = $this->Pedido->newEmptyEntity();
        if ($this->request->is('post')) {
            $pedido = $this->Pedido->patchEntity($pedido, $this->request->getData());
            if ($this->Pedido->save($pedido)) {
                setcookie('pedido', json_encode($pedido -> toArray()), time()+60);
                $this->Flash->success(__('Pedido agregado, selecciones las cantidades.'));
                return $this->redirect(['action' => 'cantidad']);
            }
            $this->Flash->error(__('No se pudo guadar el nuevo pedido. Intentelo de nuevo.'));
        }
        $estatus = $this->Pedido->Estatus->find('list', ['limit' => 200]);
        $cliente = $this->Pedido->Cliente->find('list', ['limit' => 200]);
        $direccion = $this->Pedido->Direccion->find('list', ['limit' => 200]);
        $cupon = $this->Pedido->Cupon->find('list', ['limit' => 200]);
        $merchandising = $this->Pedido->Merchandising->find('list', ['limit' => 200]);
        $this->set(compact('pedido', 'estatus', 'cliente', 'direccion', 'cupon', 'merchandising'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedido = $this->Pedido->get($id, [
            'contain' => ['Merchandising'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedido->patchEntity($pedido, $this->request->getData());
            if ($this->Pedido->save($pedido)) {
                $this->Flash->success(__('Estatús correctamente actualizado'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ha ocurrido un error al guardar el estatús. Intentelo de nuevo'));
        }
        $estatus = $this->Pedido->Estatus->find('list', ['limit' => 200]);
        $cliente = $this->Pedido->Cliente->find('list', ['limit' => 200]);
        $direccion = $this->Pedido->Direccion->find('list', ['limit' => 200]);
        $cupon = $this->Pedido->Cupon->find('list', ['limit' => 200]);
        $merchandising = $this->Pedido->Merchandising->find('list', ['limit' => 200]);
        $this->set(compact('pedido', 'estatus', 'cliente', 'direccion', 'cupon', 'merchandising'));
    }

    public function factura($id = null)
    {
        $pedido = $this->Pedido->get($id, [
            'contain' => ['Estatus', 'Cliente', 'Direccion', 'Cupon', 'Merchandising'],
        ]);
        $this->viewBuilder()->setClassName('CakePdf.Pdf');
        $this->viewBuilder()->setOption(
            'pdfConfig',
            [
                'orientation' => 'portrait',
                'filename' => 'Factura_Pedido_' . $id.'.pdf'
            ]
        );

        $this->set('pedido', $pedido);
    }

    public function cantidad()
    {
        if ($this->request->is('post')) {
            $conn = ConnectionManager::get('default');
            $pedido = json_decode($_COOKIE['pedido'], true);
            $count = 0;
            $good = true;
            foreach (json_decode($_COOKIE['pedido'], true)['merchandising'] as $pedido):
                if (!$conn->execute('UPDATE pedido_merchandising SET cantidad = :can WHERE pedido_id = :com_id AND merchandising_id = :mer_id', ['can' => $this->request->getData()[$count], 'com_id' => json_decode($_COOKIE['pedido'], true)['id'], 'mer_id' => $pedido['id']])) {
                    $good = false;
                }
                $count++;
            endforeach;
            if ($good) {
                $this->Flash->success(__('Se han agregado las cantidades.'));
            } else {
                $conn->execute('DELETE FROM pedido_merchandising WHERE pedido_id = :com_id', ['com_id' => json_decode($_COOKIE['pedido'], true)['id']]);
                $this->Flash->success(__('Ocurrió un error al agregar las cantidades.'));
            }
            return $this->redirect(['action' => 'index']);
        }
    }
}
