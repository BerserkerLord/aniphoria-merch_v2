<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fabricante[]|\Cake\Collection\CollectionInterface $fabricante
 */
?>
<div class="fabricante index content">
    <?= $this->Html->link(__('New Fabricante'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fabricante') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('rfc') ?></th>
                    <th><?= $this->Paginator->sort('razon_social') ?></th>
                    <th><?= $this->Paginator->sort('direccion') ?></th>
                    <th><?= $this->Paginator->sort('telefono') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fabricante as $fabricante): ?>
                <tr>
                    <td><?= $this->Number->format($fabricante->id) ?></td>
                    <td><?= h($fabricante->rfc) ?></td>
                    <td><?= h($fabricante->razon_social) ?></td>
                    <td><?= h($fabricante->direccion) ?></td>
                    <td><?= $this->Number->format($fabricante->telefono) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fabricante->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fabricante->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fabricante->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fabricante->id)]) ?>
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
