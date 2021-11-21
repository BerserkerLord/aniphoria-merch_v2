<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Imagen[]|\Cake\Collection\CollectionInterface $imagen
 */
?>
<div class="imagen index content">
    <?= $this->Html->link(__('New Imagen'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Imagen') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('merchandising_id') ?></th>
                    <th><?= $this->Paginator->sort('imagen') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($imagen as $imagen): ?>
                <tr>
                    <td><?= $this->Number->format($imagen->id) ?></td>
                    <td><?= $imagen->has('merchandising') ? $this->Html->link($imagen->merchandising->id, ['controller' => 'Merchandising', 'action' => 'view', $imagen->merchandising->id]) : '' ?></td>
                    <td><?= h($imagen->imagen) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $imagen->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $imagen->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $imagen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagen->id)]) ?>
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
