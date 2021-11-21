<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchandising[]|\Cake\Collection\CollectionInterface $merchandising
 */
?>
<div class="merchandising index content">
    <?= $this->Html->link(__('New Merchandising'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Merchandising') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('categoria_id') ?></th>
                    <th><?= $this->Paginator->sort('articulo') ?></th>
                    <th><?= $this->Paginator->sort('costo') ?></th>
                    <th><?= $this->Paginator->sort('precio') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($merchandising as $merchandising): ?>
                <tr>
                    <td><?= $this->Number->format($merchandising->id) ?></td>
                    <td><?= $merchandising->has('categorium') ? $this->Html->link($merchandising->categorium->id, ['controller' => 'Categoria', 'action' => 'view', $merchandising->categorium->id]) : '' ?></td>
                    <td><?= h($merchandising->articulo) ?></td>
                    <td><?= $this->Number->format($merchandising->costo) ?></td>
                    <td><?= $this->Number->format($merchandising->precio) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $merchandising->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $merchandising->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $merchandising->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchandising->id)]) ?>
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
