<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchandising $merchandising
 */
?>
<div class="row">
    <div class="column-responsive justify-content-center">
        <div class="content">
            <div class="column-responsive justify-content-center">
                <div class="row m-0 pl-4 pb-3">
                    Detalles del producto
                </div>
                <div class="row border m-0 mb-5">
                    <div class="col-4">
                        <?php foreach ($merchandising->imagen as $img) : ?>
                            <?php $imageName=file_exists('/img/productos/'.$img->nombre)?$img->nombre:'default.png'; ?>
                            <tr>
                                <td><?= @$this->Html->image('/img/productos/'.$img->nombre, ['width' => '142', 'height' => '142']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-8">
                        <table>
                            <tr>
                                <th><?= __('Categoría') ?></th>
                                <td><?=  h($merchandising->categorium->categoria) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Articulo') ?></th>
                                <td><?= h($merchandising->articulo) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Costo') ?></th>
                                <td><?= '$'.$this->Number->format($merchandising->costo) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Precio') ?></th>
                                <td><?= '$'.$this->Number->format($merchandising->precio) ?></td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="#" class="btn btn-success">Comprar</a>
                                <div class="col-lg-6">
                                    <?= $this->Form->create(null); ?>
                                    <?= $this->Form->control('qty', ['type' => 'number', 'label' => 'Cantidad', 'value' => 1, 'class' => 'text-center']); ?>
                                    <?= $this->Form->control('imagen', ['type' => 'hidden', 'value' => $merchandising->imagen[0]->nombre]) ?>
                                    <?= $this->Form->control('id', ['type' => 'hidden', 'value' => $merchandising->id]) ?>
                                    <?= $this->Form->postButton('Añadir al carrito', ['controller' => 'Merchandising', 'action' => 'shopCart'], ['name' => 'add']) ?>
                                    <?= $this->Form->end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center pt-3">
                        <h4>Productos relacionados</h4>
                    </div>
                </div>
                <div class="row mt-3 p-0">
                    <?php
                        foreach($related as $key=>$productRelated): ?>
                            <div class="col-3 text-center">
                                <?php $imageName=empty($productRelated->imagen[0]->nombre)?'default.png':$productRelated->imagen[0]->nombre; ?>
                                <?= $this->Html->link($this->Html->image('/img/productos/'.$imageName, array("alt" => "imagen-producto",
                                    'width' => '250', 'height' => '250' )), ['controller' => 'Merchandising', 'action' => 'view', $productRelated->id], array('escape' => false)); ?>
                                <h3><?= $productRelated->articulo ?></h3>
                                <p class="product-price"><?= '$'.$productRelated->precio ?></p>
                            </div>
                     <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
