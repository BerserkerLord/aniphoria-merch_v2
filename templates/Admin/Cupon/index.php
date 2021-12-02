<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cupon[]|\Cake\Collection\CollectionInterface $cupon
 */
?>
<div class="cupon index content">
    <?= $this->Html->link(__('Nuevo Cupón'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h2><?= __('Cupones') ?></h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="actions"><?= $this->Paginator->sort('codigo') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('fecha_lanzamiento') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('fecha_expiracion') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('porcentaje', 'Porcentaje de descuento') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('minimo', 'Mínimo de compra') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cupon as $cupon): ?>
                <tr>
                    <td><?= h($cupon->codigo) ?></td>
                    <td><?= h($cupon->fecha_lanzamiento) ?></td>
                    <td><?= h($cupon->fecha_expiracion) ?></td>
                    <td><?= $this->Number->format($cupon->porcentaje).'%' ?></td>
                    <td><?= '$'.$this->Number->format($cupon->minimo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fas fa-eye pr-2"></i>', ['action' => 'view', $cupon->id], ['escape' => false]) ?>
                        <?= $this->Html->link('<i class="fas fa-pen pr-2"></i>', ['action' => 'edit', $cupon->id], ['escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} en total')) ?></p>
    </div>
</div>
