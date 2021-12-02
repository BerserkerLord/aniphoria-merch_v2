<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra[]|\Cake\Collection\CollectionInterface $compra
 */
?>
<div class="compra index content">
    <?= $this->Html->link(__('Nueva Compra'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h2><?= __('Compras a fabricantes') ?></h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="actions"><?= $this->Paginator->sort('id', 'No. Compra') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('estatus_id') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('fabricante_id') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('fecha') ?></th>
                    <th class="actions"><?= __('Total') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($compra as $compra): ?>
                <tr>
                    <td><?= $this->Number->format($compra->id) ?></td>
                    <td><?= $compra->estatus->estatus ?></td>
                    <td class="tables-link"><?= $compra->has('fabricante') ? $this->Html->link($compra->fabricante->razon_social, ['controller' => 'Fabricante', 'action' => 'view', $compra->fabricante->id]) : '' ?></td>
                    <td><?= h($compra->fecha) ?></td>
                    <?php
                        $total = 0;
                        foreach($compra['merchandising'] as $key=>$merch){ $total += $merch['costo'] * $merch['_joinData']['cantidad']; }
                    ?>
                    <td>$<?= $total ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fas fa-eye pr-2"></i>', ['action' => 'view', $compra->id], ['escape' => false, 'title' => 'Ver Compra']) ?>
                        <?= $this->Html->link('<i class="fas fa-check pr-2"></i>', ['action' => 'edit', $compra->id], ['escape' => false, 'title' => 'Cambiar estatus']) ?>
                        <?= $this->Html->link('<i class="fas fa-file-alt pr-2"></i>', ['action' => 'factura', $compra->id], ['escape' => false, 'title' => 'Factura']) ?>
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
