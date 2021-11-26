<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comentario[]|\Cake\Collection\CollectionInterface $comentario
 */
?>
<div class="comentario index content">
    <h3><?= __('Comentario') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('merchandising_id') ?></th>
                    <th><?= $this->Paginator->sort('cliente_id') ?></th>
                    <th><?= $this->Paginator->sort('calificacion') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comentario as $comentario): ?>
                <tr>
                    <td><?= $this->Number->format($comentario->id) ?></td>
                    <td><?= $comentario->has('merchandising') ? $this->Html->link($comentario->merchandising->articulo, ['controller' => 'Merchandising', 'action' => 'view', $comentario->merchandising->id]) : '' ?></td>
                    <td><?= $comentario->has('cliente') ? $this->Html->link($comentario->cliente->usuario, ['controller' => 'Cliente', 'action' => 'view', $comentario->cliente->id]) : '' ?></td>
                    <td><?= $this->Number->format($comentario->calificacion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $comentario->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $comentario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comentario->id)]) ?>
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
