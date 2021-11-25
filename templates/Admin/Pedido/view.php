<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pedido'), ['action' => 'edit', $pedido->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pedido'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pedido'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pedido'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pedido view content">
            <h3><?= h($pedido->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Estatus') ?></th>
                    <td><?= $pedido->has('estatus') ? $this->Html->link($pedido->estatus->estatus, ['controller' => 'Estatus', 'action' => 'view', $pedido->estatus->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cliente') ?></th>
                    <td><?= $pedido->has('cliente') ? $this->Html->link($pedido->cliente->usuario, ['controller' => 'Cliente', 'action' => 'view', $pedido->cliente->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Direccion') ?></th>
                    <td><?= $pedido->has('direccion') ? $this->Html->link($pedido->direccion->direccion, ['controller' => 'Direccion', 'action' => 'view', $pedido->direccion->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cupon') ?></th>
                    <td><?= $pedido->has('cupon') ? $this->Html->link($pedido->cupon->id, ['controller' => 'Cupon', 'action' => 'view', $pedido->cupon->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pedido->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($pedido->fecha) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Merchandising') ?></h4>
                <?php if (!empty($pedido->merchandising)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Categoria Id') ?></th>
                            <th><?= __('Articulo') ?></th>
                            <th><?= __('Detalles') ?></th>
                            <th><?= __('Costo') ?></th>
                            <th><?= __('Precio') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pedido->merchandising as $merchandising) : ?>
                        <tr>
                            <td><?= h($merchandising->id) ?></td>
                            <td><?= h($merchandising->categoria_id) ?></td>
                            <td><?= h($merchandising->articulo) ?></td>
                            <td><?= h($merchandising->detalles) ?></td>
                            <td><?= h($merchandising->costo) ?></td>
                            <td><?= h($merchandising->precio) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Merchandising', 'action' => 'view', $merchandising->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Merchandising', 'action' => 'edit', $merchandising->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Merchandising', 'action' => 'delete', $merchandising->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchandising->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
