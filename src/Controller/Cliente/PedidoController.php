<?php
declare(strict_types=1);

namespace App\Controller\Cliente;
use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;
use Cake\Event\EventInterface;

/**
 * Pedido Controller
 *
 * @property \App\Model\Table\PedidoTable $Pedido
 * @property \App\Model\Table\MerchandisingTable $Merchandising
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidoController extends AppController
{
    /**
     * @var \Cake\Datasource\RepositoryInterface|null
     */

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
        $query = $this->Pedido->find('all')->where(['Cliente.id' => $_SESSION['Auth']['id']])->contain(['Estatus', 'Cliente', 'Direccion', 'Cupon', 'Merchandising' => ['Categoria']]);
        $pedido = $this->paginate($query);

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

    public function checkout()
    {
        $cart = new Cart([
            // Maximum item can added to cart, 0 = Unlimited
            'cartMaxItem' => 0,

            // Maximum quantity of a item can be added to cart, 0 = Unlimited
            'itemMaxQuantity' => 10,

            // Do not use cookie, cart items will gone after browser closed
            'useCookie' => true,
        ]);
        $query = $this-> Pedido -> Merchandising->find('all')->contain(['Categoria', 'Imagen']);
        $merchandising = $this->paginate(($query));

        $this->set(compact('cart', 'merchandising'));
    }
}
