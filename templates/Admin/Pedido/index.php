<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido[]|\Cake\Collection\CollectionInterface $pedido
 */
?>
<div class="pedido index content">
    <?= $this->Html->link(__('Nuevo Pedido'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h2><?= __('Pedidos de clientes') ?></h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="actions"><?= $this->Paginator->sort('id', 'No. Venta') ?></th>
                    <th><?= __('Estatús') ?></th>
                    <th><?= __('Cliente') ?></th>
                    <th><?= __('Dirección') ?></th>
                    <th><?= __('Cupón') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th class="actions"><?= __('Subtotal') ?></th>
                    <th class="actions"><?= __('Total') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                    <th><?= __('Método de pago') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedido as $pedido): ?>
                <tr>
                    <td><?= $this->Number->format($pedido->id) ?></td>
                    <td><?= h($pedido->estatus->estatus) ?></td>
                    <td class="tables-link"><?= $pedido->has('cliente') ? $this->Html->link($pedido->cliente->nombre.' '.$pedido->cliente->apaterno.' '.$pedido->cliente->amaterno, ['controller' => 'Cliente', 'action' => 'view', $pedido->cliente->id]) : '' ?></td>
                    <td class="tables-link"><?= $pedido->has('direccion') ? $this->Html->link($pedido->direccion->direccion, ['controller' => 'Direccion', 'action' => 'view', $pedido->direccion->id]) : '' ?></td>
                    <td class="tables-link"><?= $pedido->has('cupon') ? $this->Html->link($pedido->cupon->codigo, ['controller' => 'Cupon', 'action' => 'view', $pedido->cupon->id]) : '' ?></td>
                    <td><?= h($pedido->fecha) ?></td>
                    <?php
                        $subtotal = 0;
                        $total = 0;
                        $descuento = 0;
                        foreach($pedido['merchandising'] as $key=>$merch){ $subtotal += $merch['precio'] * $merch['_joinData']['cantidad']; }
                        if(isset($pedido['cupon'])){ $descuento = ($subtotal*$pedido['cupon']['porcentaje'])/100; }
                        $total = $subtotal - $descuento;
                    ?>
                    <td>$<?= number_format($subtotal, 2) ?></td>
                    <td>$<?= number_format($total, 2) ?></td>
                    <td><?= $pedido->metodo ? __('Tarjeta') : __('Efectivo'); ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fas fa-eye pr-2"></i>', ['action' => 'view', $pedido->id], ['escape' => false, 'title' => 'Ver Pedido']) ?>
                        <?= $this->Html->link('<i class="fas fa-check pr-2"></i>', ['action' => 'edit', $pedido->id], ['escape' => false, 'title' => 'Cambiar estatus']) ?>
                        <?= $this->Html->link('<i class="fas fa-file-alt pr-2"></i>', ['action' => 'factura', $pedido->id], ['escape' => false, 'title' => 'Factura']) ?>
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
