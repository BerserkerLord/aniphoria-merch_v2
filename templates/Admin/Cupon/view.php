<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cupon $cupon
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cupon'), ['action' => 'edit', $cupon->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cupon'), ['action' => 'delete', $cupon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cupon->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cupon'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cupon'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cupon view content">
            <h3><?= h($cupon->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Codigo') ?></th>
                    <td><?= h($cupon->codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cupon->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Porcentaje') ?></th>
                    <td><?= $this->Number->format($cupon->porcentaje) ?></td>
                </tr>
                <tr>
                    <th><?= __('Minimo') ?></th>
                    <td><?= $this->Number->format($cupon->minimo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Lanzamiento') ?></th>
                    <td><?= h($cupon->fecha_lanzamiento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Expiracion') ?></th>
                    <td><?= h($cupon->fecha_expiracion) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Pedido') ?></h4>
                <?php if (!empty($cupon->pedido)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Estatus Id') ?></th>
                            <th><?= __('Cliente Id') ?></th>
                            <th><?= __('Direccion Id') ?></th>
                            <th><?= __('Cupon Id') ?></th>
                            <th><?= __('Fecha') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($cupon->pedido as $pedido) : ?>
                        <tr>
                            <td><?= h($pedido->id) ?></td>
                            <td><?= h($pedido->estatus_id) ?></td>
                            <td><?= h($pedido->cliente_id) ?></td>
                            <td><?= h($pedido->direccion_id) ?></td>
                            <td><?= h($pedido->cupon_id) ?></td>
                            <td><?= h($pedido->fecha) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Pedido', 'action' => 'view', $pedido->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Pedido', 'action' => 'edit', $pedido->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pedido', 'action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?>
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
