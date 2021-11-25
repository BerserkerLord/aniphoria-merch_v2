<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cupon[]|\Cake\Collection\CollectionInterface $cupon
 */
?>
<div class="cupon index content">
    <?= $this->Html->link(__('New Cupon'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cupon') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('codigo') ?></th>
                    <th><?= $this->Paginator->sort('fecha_lanzamiento') ?></th>
                    <th><?= $this->Paginator->sort('fecha_expiracion') ?></th>
                    <th><?= $this->Paginator->sort('porcentaje') ?></th>
                    <th><?= $this->Paginator->sort('minimo') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cupon as $cupon): ?>
                <tr>
                    <td><?= $this->Number->format($cupon->id) ?></td>
                    <td><?= h($cupon->codigo) ?></td>
                    <td><?= h($cupon->fecha_lanzamiento) ?></td>
                    <td><?= h($cupon->fecha_expiracion) ?></td>
                    <td><?= $this->Number->format($cupon->porcentaje) ?></td>
                    <td><?= $this->Number->format($cupon->minimo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cupon->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cupon->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cupon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cupon->id)]) ?>
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
