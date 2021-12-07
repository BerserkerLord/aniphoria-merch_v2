<?php
declare(strict_types=1);

namespace App\Controller\Cliente;
use App\Controller\Cliente\Cart;
use App\Model\Entity\Direccion;
use Cake\Datasource\ConnectionManager;
use Stripe;
use App\Controller\AppController;
use Cake\Event\EventInterface;

/**
 * Pedido Controller
 * @property \App\Model\Table\PedidoTable $Pedido
 * @property \App\Model\Table\MerchandisingTable $Merchandising
 * @property \App\Model\Table\PedidoMerchandisingTable $PedidoMerchandising
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
        $this->loadModel('Direccion');
        $cart = new Cart([
            // Maximum item can added to cart, 0 = Unlimited
            'cartMaxItem' => 0,

            // Maximum quantity of a item can be added to cart, 0 = Unlimited
            'itemMaxQuantity' => 10,

            // Do not use cookie, cart items will gone after browser closed
            'useCookie' => true,
        ]);
        $query = $this->Pedido->Merchandising->find('all')->contain(['Categoria', 'Imagen']);
        $merchandising = $this->paginate(($query));
        $query = $this->Direccion->find('list')->where(['Direccion.cliente_id' => $_SESSION['Auth']['id']]);
        $direcciones = $this->paginate($query);
        $this->set(compact('cart', 'merchandising', 'direcciones'));
    }

    public function payment()
    {
        require_once VENDOR_PATH. '/stripe/stripe-php/init.php';
        Stripe\Stripe::setApiKey(STRIPE_SECRET);
        try {
            $stripe = Stripe\Charge::create([
                "amount" => 10 * 100,
                "currency" => "mxn",
                "source" => $_REQUEST["stripeToken"],
                "description" => "Test payment via Stripe From onlinewebtutorblog.com"
            ]);
            $this->Flash->success(__('Payment done successfully'));

            $this -> loadModel('Merchandising');
            $this -> loadModel('PedidoMerchandising');
            $pedido = $this->Pedido->newEmptyEntity();
            if ($this->request->is('post')) {
                $pedido -> direccion_id = $this -> request -> getData('direccion_id');
                $pedido -> fecha = date('Y-m-d');
                $pedido -> estatus_id = 5;
                $pedido -> cliente_id = $_SESSION['Auth'] -> id;
                $query = $this->Pedido->find()->select(['id' => 'MAX(Pedido.id)']);
                $max = $this -> paginate($query);
                $nextid = $max -> toArray()[0]['id'] + 1;

                if ($this->Pedido->save($pedido)) {
                    $cart = new Cart([
                        // Maximum item can added to cart, 0 = Unlimited
                        'cartMaxItem' => 0,

                        // Maximum quantity of a item can be added to cart, 0 = Unlimited
                        'itemMaxQuantity' => 10,

                        // Do not use cookie, cart items will gone after browser closed
                        'useCookie' => true,
                    ]);
                    $allItems = $cart -> getItems();
                    foreach ($allItems as $id => $items)
                    {
                        foreach ($items as $item)
                        {
                            $pedidoMerch = $this -> PedidoMerchandising -> newEmptyEntity();
                            $pedidoMerch -> pedido_id = $nextid;
                            $pedidoMerch -> merchandising_id = $item['id'];
                            $pedidoMerch -> cantidad = $item['quantity'];
                            $this -> PedidoMerchandising -> save($pedidoMerch);
                        }
                    }
                    $cart -> clear();
                }
            }

        } catch (Stripe\Exception\ApiErrorException $e) {
            echo '<pre>';
            print_r($e);
            echo '</pre>';
            die();
        }

        return $this->redirect(['_name' => 'index']);
    }
}
