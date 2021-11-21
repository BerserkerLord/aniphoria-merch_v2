<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra[]|\Cake\Collection\CollectionInterface $compra
 */
?>
<div class="compra index content">
    <?= $this->Html->link(__('New Compra'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Compra') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('estatus_id') ?></th>
                    <th><?= $this->Paginator->sort('fabricante_id') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($compra as $compra): ?>
                <tr>
                    <td><?= $this->Number->format($compra->id) ?></td>
                    <td><?= $compra->has('estatus') ? $this->Html->link($compra->estatus->id, ['controller' => 'Estatus', 'action' => 'view', $compra->estatus->id]) : '' ?></td>
                    <td><?= $compra->has('fabricante') ? $this->Html->link($compra->fabricante->id, ['controller' => 'Fabricante', 'action' => 'view', $compra->fabricante->id]) : '' ?></td>
                    <td><?= h($compra->fecha) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $compra->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $compra->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $compra->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compra->id)]) ?>
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
