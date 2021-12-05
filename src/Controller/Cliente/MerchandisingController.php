<?php
declare(strict_types=1);

namespace App\Controller\Cliente;

use App\Controller\AppController;

/**
 * Merchandising Controller
 *
 * @property \App\Model\Table\MerchandisingTable $Merchandising
 * @method \App\Model\Entity\Merchandising[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchandisingController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $key = $this->request->getQuery('key');
        if($key){
            $query = $this->Merchandising->find('all')->where(['OR' => ['articulo LIKE' => '%'.$key.'%', 'Categoria.categoria LIKE' => '%'.$key.'%']])->contain(['Categoria', 'Imagen']);
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
        $merchandising = $this->Merchandising->get($id, [
            'contain' => ['Categoria', 'Imagen'],
        ]);
        $query = $this->Merchandising->find('all')->where(
            ['AND' => ['Categoria.categoria LIKE' => $merchandising->categorium->categoria, 'Merchandising.id !=' => $id]])->order('RAND()')->limit(4)->contain(['Categoria', 'Imagen']);
        $related = $this->paginate($query);

        $this->set(compact('merchandising', 'related'));
    }
}
