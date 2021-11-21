<?php
declare(strict_types=1);

namespace App\Controller\Admin;

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
        $this->paginate = [
            'contain' => ['Categoria'],
        ];
        $merchandising = $this->paginate($this->Merchandising);

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

        $this->set(compact('merchandising'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $merchandising = $this->Merchandising->newEmptyEntity();
        $merch = $this->Merchandising->newEmptyEntity();
        if ($this->request->is('post')) {
            $merchandising = $this->Merchandising->patchEntity($merchandising, $this->constructData($this->request->getData()));
            if ($this->Merchandising->save($merchandising)) {
                if(!empty($this->constructData($this->request->getData())['imagen']['0']['nombre'])){ $this->addImages(); }
                $this->Flash->success(__('The merchandising has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchandising could not be saved. Please, try again.'));
        }
        $categoria = $this->Merchandising->Categoria->find('list', ['limit' => 200]);
        $this->set(compact('merchandising', 'categoria'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Merchandising id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $merchandising = $this->Merchandising->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchandising = $this->Merchandising->patchEntity($merchandising, $this->constructData($this->request->getData()));
            if ($this->Merchandising->save($merchandising)) {
                $this->Flash->success(__('The merchandising has been saved.'));
                if(!empty($this->constructData($this->request->getData())['imagen']['0']['nombre'])){ $this->addImages(); }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchandising could not be saved. Please, try again.'));
        }
        $categoria = $this->Merchandising->Categoria->find('list', ['limit' => 200]);
        $this->set(compact('merchandising', 'categoria'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Merchandising id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        //$merchandising = $this->Merchandising->get($id);
        $merchandising = $this->Merchandising->get($id, [
            'contain' => ['Categoria', 'Imagen'],
        ]);
        if ($this->Merchandising->delete($merchandising)) {
            foreach($merchandising->toArray()['imagen'] as $key=>$image){
                $pathImagen = WWW_ROOT.'img/productos/'.$image['nombre'];
                unlink($pathImagen);
            }
            $this->Flash->success(__('The merchandising has been deleted.'));
        } else {
            $this->Flash->error(__('The merchandising could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function addImages(){
        foreach($this -> request-> getData('imagen') as $key =>$imagen){
            $nameImg = $imagen->getClientFilename();
            $pathImagen = WWW_ROOT.'img/productos/'.$nameImg;
            $imagen -> moveTo($pathImagen);
        }
    }

    public function constructData($datos){
        
        //$name = substr(crypt(sha1(hash('sha512', md5(rand(1, 9999).$this -> request-> getData('imagen')->getClientFilename()))), 'cruzazul campeon'), 1, 10);;
        if(!empty($this->request->getData('imagen')[0]->getClientFilename())){
            
            $imagenes=array();
            foreach($this -> request-> getData('imagen') as $key=> $images){
                //$imagen = array('nombre'=>substr(crypt(sha1(hash('sha512', md5(rand(1, 9999).$images))), 'cruzazulcampeon'), 1, 10));
                $imagen=array('nombre'=>$images->getClientFilename());
                array_push($imagenes, $imagen);
            }
            $data = array(
                'categoria_id' => $datos['categoria_id'],
                'articulo' => $datos['articulo'],
                'detalles' => $datos['detalles'],
                'costo' => $datos['costo'],
                'precio' => $datos['precio'],
                'imagen' => $imagenes);
            return $data;
        }
        $data = array(
            'categoria_id' => $datos['categoria_id'],
            'articulo' => $datos['articulo'],
            'detalles' => $datos['detalles'],
            'costo' => $datos['costo'],
            'precio' => $datos['precio']);
        return $data;
    }
}