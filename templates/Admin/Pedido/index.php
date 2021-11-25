<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido[]|\Cake\Collection\CollectionInterface $pedido
 */
?>
<div class="pedido index content">
    <?= $this->Html->link(__('New Pedido'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pedido') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('estatus_id') ?></th>
                    <th><?= $this->Paginator->sort('cliente_id') ?></th>
                    <th><?= $this->Paginator->sort('direccion_id') ?></th>
                    <th><?= $this->Paginator->sort('cupon_id') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedido as $pedido): ?>
                <tr>
                    <td><?= $this->Number->format($pedido->id) ?></td>
                    <td><?= $pedido->has('estatus') ? $this->Html->link($pedido->estatus->estatus, ['controller' => 'Estatus', 'action' => 'view', $pedido->estatus->id]) : '' ?></td>
                    <td><?= $pedido->has('cliente') ? $this->Html->link($pedido->cliente->usuario, ['controller' => 'Cliente', 'action' => 'view', $pedido->cliente->id]) : '' ?></td>
                    <td><?= $pedido->has('direccion') ? $this->Html->link($pedido->direccion->direccion, ['controller' => 'Direccion', 'action' => 'view', $pedido->direccion->id]) : '' ?></td>
                    <td><?= $pedido->has('cupon') ? $this->Html->link($pedido->cupon->id, ['controller' => 'Cupon', 'action' => 'view', $pedido->cupon->id]) : '' ?></td>
                    <td><?= h($pedido->fecha) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pedido->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pedido->id]) ?>
                        <?= $this->Html->link(__('Factura'), ['action' => 'factura', $pedido->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
