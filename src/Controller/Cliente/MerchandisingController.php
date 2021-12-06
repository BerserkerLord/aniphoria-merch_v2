<?php
declare(strict_types=1);

namespace App\Controller\Cliente;

use App\Controller\AppController;
use App\Controller\Cliente\Cart;
use Cake\Event\EventInterface;

/**
 * Merchandising Controller
 *
 * @property \App\Model\Table\MerchandisingTable $Merchandising
 * @method \App\Model\Entity\Merchandising[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchandisingController extends AppController
{
    /**
     * @var \Cake\Datasource\RepositoryInterface|null
     */
    /**
     * @var \Cake\Datasource\RepositoryInterface|null
     */

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this -> viewBuilder() -> setLayout('client_default');
        $this->Authentication->allowUnauthenticated(['index','view']);
    }


    public function index()
    {
        if(isset($_POST['search'])){
            $buscao = $_POST['search'];
            $query = $this->Merchandising->find('all')->where(['OR' => ['articulo LIKE' => '%'.$buscao.'%', 'Categoria.categoria LIKE' => '%'.$buscao.'%']])->contain(['Categoria', 'Imagen']);
        }
        else{
            $query = $this->Merchandising->find('all')->contain(['Categoria', 'Imagen']);
        }
        $merchandising = $this->paginate($query);

        $this->set(compact('merchandising'));
    }




    /**
     * View method
     *
     * @param string|null $id Merchandising id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if(isset($_POST['add'])){
            $this->cart()
;        }
        $merchandising = $this->Merchandising->get($id, [
            'contain' => ['Categoria', 'Imagen'],
        ]);
        $query = $this->Merchandising->find('all')->where(
            ['AND' => ['Categoria.categoria LIKE' => $merchandising->categorium->categoria, 'Merchandising.id !=' => $id]])->order('RAND()')->limit(4)->contain(['Categoria', 'Imagen']);
        $related = $this->paginate($query);

        $this->set(compact('merchandising', 'related'));
    }
    public function cart(){
        $cart = new Cart([
            // Maximum item can added to cart, 0 = Unlimited
            'cartMaxItem' => 0,

            // Maximum quantity of a item can be added to cart, 0 = Unlimited
            'itemMaxQuantity' => 10,

            // Do not use cookie, cart items will gone after browser closed
            'useCookie' => true,
        ]);
        $query = $this->Merchandising->find('all')->contain(['Categoria', 'Imagen']);
        $merchandising = $this->paginate(($query));

        // Empty the cart
        if (isset($_POST['clear'])) {
            $cart->clear();
        }

        // Add item
        if (isset($_POST['add'])) {
            foreach ($merchandising as $merch) {
                if ($_POST['id'] == $merch->id) {
                    break;
                }
            }

            $cart->add($merch->id, $_POST['qty'], [
                'price' => $merch->precio,
                'imagen' => $_POST['imagen']
            ]);
            $this->Flash->success(__('Producto agregado al carrito de compras.'));
        }

        // Update item
        if (isset($_POST['update'])) {
            foreach ($merchandising as $merch) {
                if ($_POST['id'] == $merch->id) {
                    break;
                }
            }

            $cart->update($merch->id, $_POST['qty'], [
                'price' => $merch->price,
                'color' => (isset($_POST['color'])) ? $_POST['color'] : '',
            ]);
        }

        // Remove item
        if (isset($_POST['remove'])) {
            foreach ($merchandising as $merch) {
                if ($_POST['id'] == $merch->id) {
                    break;
                }
            }
                $cart->remove($merch->id, [
                    'price' => $merch->precio,
                    'imagen' => $_POST['imagen']
                ]);
        }
        $this->set(compact('cart', 'merchandising'));
    }
}
