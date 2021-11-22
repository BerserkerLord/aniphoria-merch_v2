<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Direccion[]|\Cake\Collection\CollectionInterface $direccion
 */
?>
<div class="direccion index content">
    <?= $this->Html->link(__('New Direccion'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Direccion') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('cliente_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($direccion as $direccion): ?>
                <tr>
                    <td><?= $this->Number->format($direccion->id) ?></td>
                    <td><?= $this->Number->format($direccion->cliente_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $direccion->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $direccion->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $direccion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $direccion->id)]) ?>
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
