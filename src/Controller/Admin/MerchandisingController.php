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
            'contain' => ['Categoria', 'Imagen'],
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
                $this->Flash->success(__('El artículo ha sido agregado correctamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El artículo no se ha podido agregar. Intentelo de nuevo.'));
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
                $this->Flash->success(__('El artículo ha sido actualizado correctamente.'));
                if(!empty($this->constructData($this->request->getData())['imagen']['0']['nombre'])){ $this->addImages(); }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El artículo no se ha podido actualizar. Intentelo de nuevo.'));
        }
        $categoria = $this->Merchandising->Categoria->find('list', ['limit' => 200]);
        $this->set(compact('merchandising', 'categoria'));
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

    public function ban($id = null){

        $this->request->allowMethod(['post', 'delete']);
        $merchandising = $this->Merchandising->get($id);
        $merchandising->estatus=0;
        if ($this->Merchandising->save($merchandising)) {
            $this->Flash->success(__('El artículo ha sido inhabilitado.'));
        } else {
            $this->Flash->error(__('No se pudo inhabilitar el articulo. Intentelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function enable($id = null){

        $this->request->allowMethod(['post', 'delete']);
        $merchandising = $this->Merchandising->get($id);
        $merchandising->estatus=1;
        if ($this->Merchandising->save($merchandising)) {
            $this->Flash->success(__('El artículo ha sido habilitado.'));
        } else {
            $this->Flash->error(__('No se pudo habilitar el articulo. Intentelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
