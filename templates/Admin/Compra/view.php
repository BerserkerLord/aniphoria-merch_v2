<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra $compra
 */
?>
<div class="row">
    <div class="column-responsive justify-content-center">
        <div class="content">
            <div class="column-responsive justify-content-center">
                <div class="justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <h1><?= 'Compra No. '.$compra->id ?></h1>
                            <table style="width: 100%">
                                <?php
                                    $total = 0;
                                    foreach($compra['merchandising'] as $key=>$merch){ $total += $merch['costo'] * $merch['_joinData']['cantidad']; }
                                ?>
                                <tr>
                                    <th><?= __('No. de Factura') ?></th>
                                    <td><?= $this->Number->format($compra->id) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Estatus') ?></th>
                                    <td><?= h($compra->estatus->estatus) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Fabricante') ?></th>
                                    <td class="tables-link"><?= $compra->has('fabricante') ? $this->Html->link($compra->fabricante->razon_social, ['controller' => 'Fabricante', 'action' => 'view', $compra->fabricante->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Fecha') ?></th>
                                    <td><?= h($compra->fecha) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Total') ?></th>
                                    <td><?= '$'.h($total) ?></td>
                                </tr>
                            </table>
                            <div class="related">
                                <h2><?= __('Articulos Comprados') ?></h2>
                                <?php if (!empty($compra->merchandising)) : ?>
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
                                            <?php foreach ($compra->merchandising as $merchandising) : ?>
                                                <tr>
                                                    <td><?= h($merchandising->categorium->categoria) ?></td>
                                                    <td><?= h($merchandising->articulo) ?></td>
                                                    <td><?= '$'.h($merchandising->costo) ?></td>
                                                    <td><?= '$'.h($merchandising->precio) ?></td>
                                                    <td><?= h($merchandising->_joinData->cantidad).' unidades' ?></td>
                                                    <?php $total_producto = $merchandising->costo * $merchandising->_joinData->cantidad; ?>
                                                    <td><?= '$'.$total_producto ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="side-nav related">
                                <?= $this->Html->link('<i class="fas fa-check pr-2"></i>Cambiar estatús', ['action' => 'edit', $compra->id], ['escape' => false, 'class' => 'side-nav-item']) ?>
                                <?= $this->Form->postLink('<i class="fas fa-file-alt pr-2"></i>Generar Factura', ['action' => 'factura', $compra->id], ['escape' => false, 'class' => 'side-nav-item']) ?>
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
