<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchandising $merchandising
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Merchandising'), ['action' => 'edit', $merchandising->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Merchandising'), ['action' => 'delete', $merchandising->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchandising->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Merchandising'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Merchandising'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="merchandising view content">
            <h3><?= h($merchandising->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Categorium') ?></th>
                    <td><?= $merchandising->has('categorium') ? $this->Html->link($merchandising->categorium->id, ['controller' => 'Categoria', 'action' => 'view', $merchandising->categorium->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Articulo') ?></th>
                    <td><?= h($merchandising->articulo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($merchandising->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Costo') ?></th>
                    <td><?= $this->Number->format($merchandising->costo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= $this->Number->format($merchandising->precio) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Detalles') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($merchandising->detalles)); ?>
                </blockquote>
            </div>
            <h4><?= __('Imagenes') ?></h4>
            <?php if (!empty($merchandising->imagen)) : ?>
                <table class="table table-responsive-lg table-hover">
                    <tr>
                        <th><?= __('Imagen') ?></th>
                        <th><?= __('Acciones') ?></th>
                    </tr>
                    <?php foreach ($merchandising->imagen as $img) : ?>
                        <tr>
                            <td><?= @$this->Html->image('/webroot/img/productos/'.$img->nombre, ['width' => '100', 'height' => '100']) ?></td>
                            <td>
                                <?= $this->Form->postLink('Eliminar', ['controller' => 'Imagen', 'action' => 'delete', $img->id], ['confirm' => __('¿Seguro que desea aliminar la imagen??', $img->id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
