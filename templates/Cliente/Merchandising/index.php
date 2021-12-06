<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchandising[]|\Cake\Collection\CollectionInterface $merchandising
 */
?>
<div class="content">
    <div class="row justify-content-between">
        <div class="col-md-8">
            <h2><?= __('Merchandising') ?></h2>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col">
                    <?= $this -> Form -> create(null) ?>
                    <?= $this -> Form -> control('search', ['type' => 'text', 'label' => false, 'placeholder' => 'Buscar...']) ?>
                </div>
                <div class="col">
                    <?= $this -> Form -> postButton('Buscar', ['controller' => 'Merchandising', 'action' => 'index']) ?>
                    <?= $this -> Form -> end() ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
            foreach($merchandising as $merchandising): ?>
                <div class="col-3 text-center">
                    <?php
                        if(empty($merchandising->imagen[0]->nombre)){
                            $imageName = 'default.png';
                        } else {
                            $imageName = $merchandising->imagen[0]->nombre;
                        }
                    ?>
                    <div class="single-product-item">
                        <div class="product-image">
                            <?= $this -> Html -> link($this -> Html -> image('/img/productos/'.$imageName, ['alt' => $merchandising -> articulo.'.jpg']),
                                ['controller' => 'Merchandising', 'action' => 'view', $merchandising->id], ['escape' => false]) ?>
                        </div>
                        <h3><?= $merchandising -> articulo  ?></h3>
                        <p class="product-price"><?= '$'.$merchandising -> precio ?> </p>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} en total')) ?></p>
    </div>
</div>
