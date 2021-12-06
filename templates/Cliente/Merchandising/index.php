<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchandising[]|\Cake\Collection\CollectionInterface $merchandising
 */
?>
<div class="content">
    <h2><?= __('Merchandising') ?></h2>
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
                    <?= $this->Html->link($this->Html->image('/img/productos/'.$imageName, array("alt" => "imagen-producto",
                        'width' => '250', 'height' => '250' )), ['controller' => 'Merchandising', 'action' => 'view', $merchandising->id], array('escape' => false)); ?>
                    <h3><?= $merchandising->articulo ?></h3>
                    <p class="product-price"><?= '$'.$merchandising->precio ?></p>
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
