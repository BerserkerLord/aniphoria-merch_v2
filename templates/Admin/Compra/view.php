<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra $compra
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Compra'), ['action' => 'edit', $compra->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Compra'), ['action' => 'delete', $compra->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compra->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Compra'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Compra'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="compra view content">
            <h3><?= h($compra->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Estatus') ?></th>
                    <td><?= $compra->has('estatus') ? $this->Html->link($compra->estatus->id, ['controller' => 'Estatus', 'action' => 'view', $compra->estatus->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Fabricante') ?></th>
                    <td><?= $compra->has('fabricante') ? $this->Html->link($compra->fabricante->id, ['controller' => 'Fabricante', 'action' => 'view', $compra->fabricante->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($compra->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($compra->fecha) ?></td>
                </tr>
            </table>
            <div class="related">
                
           
                <h4><?= __('Related Merchandising') ?></h4>
                <?php if (!empty($compra->merchandising)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Categoria Id') ?></th>
                            <th><?= __('Articulo') ?></th>
                            <th><?= __('Detalles') ?></th>
                            <th><?= __('Costo') ?></th>
                            <th><?= __('Precio') ?></th>
                            <th><?= __('Cantidad') ?></th>
                        </tr>
                        <?php foreach ($compra->merchandising as $merchandising) : ?>
                        <tr>
                            <td><?= h($merchandising->id) ?></td>
                            <td><?= h($merchandising->categoria_id) ?></td>
                            <td><?= h($merchandising->articulo) ?></td>
                            <td><?= h($merchandising->detalles) ?></td>
                            <td><?= h($merchandising->costo) ?></td>
                            <td><?= h($merchandising->precio) ?></td>
                            <td><?= h($merchandising->_joinData->cantidad) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
