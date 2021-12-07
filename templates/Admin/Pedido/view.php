<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<div class="row">
    <div class="column-responsive justify-content-center">
        <div class="content">
            <div class="column-responsive justify-content-center">
                <div class="justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <h1><?= 'Venta No. '.$pedido->id ?></h1>
                            <table style="width: 100%">
                                <?php
                                    $subtotal = 0;
                                    $total = 0;
                                    $descuento = 0;
                                    foreach($pedido['merchandising'] as $key=>$merch){ $subtotal += $merch['precio'] * $merch['_joinData']['cantidad']; }
                                    if(isset($pedido['cupon'])){ $descuento = ($subtotal*$pedido['cupon']['porcentaje'])/100; }
                                    $total = $subtotal - $descuento;
                                ?>
                                <tr>
                                    <th><?= __('Estatus') ?></th>
                                    <td><?= h($pedido->estatus->estatus) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Cliente') ?></th>
                                    <td class="tables-link"><?= $pedido->has('cliente') ? $this->Html->link($pedido->cliente->usuario, ['controller' => 'Cliente', 'action' => 'view', $pedido->cliente->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Direccion') ?></th>
                                    <td class="tables-link"><?= $pedido->has('direccion') ? $this->Html->link($pedido->direccion->direccion, ['controller' => 'Direccion', 'action' => 'view', $pedido->direccion->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Cupon') ?></th>
                                    <td class="tables-link"><?= $pedido->has('cupon') ? $this->Html->link($pedido->cupon->codigo, ['controller' => 'Cupon', 'action' => 'view', $pedido->cupon->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Fecha') ?></th>
                                    <td><?= h($pedido->fecha) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Subtotal') ?></th>
                                    <td><?= '$'.number_format($subtotal, 2) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Total') ?></th>
                                    <td><?= '$'.number_format($total, 2) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Método de pago') ?></th>
                                    <td><?= $pedido->metodo ? __('Tarjeta') : __('Efectivo'); ?></td>
                                </tr>
                            </table>
                            <div class="related">
                                <h2><?= __('Articulos Vendidos') ?></h2>
                                <?php if (!empty($pedido->merchandising)) : ?>
                                    <div class="table-responsive">
                                        <table>
                                            <tr>
                                                <th><?= __('Categoría') ?></th>
                                                <th><?= __('Articulo') ?></th>
                                                <th><?= __('Costo') ?></th>
                                                <th><?= __('Precio') ?></th>
                                                <th><?= __('Cantidad') ?></th>
                                                <th><?= __('Total por producto') ?></th>
                                            </tr>
                                            <?php foreach ($pedido->merchandising as $merchandising) : ?>
                                                <tr>
                                                    <td><?= h($merchandising->categorium->categoria) ?></td>
                                                    <td><?= h($merchandising->articulo) ?></td>
                                                    <td><?= '$'.number_format($merchandising->costo, 2) ?></td>
                                                    <td><?= '$'.number_format($merchandising->precio, 2) ?></td>
                                                    <td><?= h($merchandising->_joinData->cantidad).' unidades' ?></td>
                                                    <?php $total_producto = $merchandising->precio * $merchandising->_joinData->cantidad; ?>
                                                    <td><?= '$'.number_format($total_producto, 2) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="side-nav related">
                                <?= $this->Html->link('<i class="fas fa-check pr-2"></i>Cambiar estatús', ['action' => 'edit', $pedido->id], ['escape' => false, 'class' => 'side-nav-item']) ?>
                                <?= $this->Form->postLink('<i class="fas fa-file-alt pr-2"></i>Generar Factura', ['action' => 'factura', $pedido->id], ['escape' => false, 'class' => 'side-nav-item']) ?>
                                <?= $this->Html->link('<i class="fas fa-list pr-2"></i>Ver Compras', ['action' => 'index'], ['escape' => false, 'class' => 'side-nav-item']) ?>
                                <?= $this->Html->link('<i class="fas fa-plus-circle pr-2"></i>Nueva Compra', ['action' => 'add'], ['escape' => false, 'class' => 'side-nav-item']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
