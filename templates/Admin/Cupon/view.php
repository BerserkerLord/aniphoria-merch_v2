<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cupon $cupon
 */
?>
<div class="row">
    <div class="column-responsive justify-content-center">
        <div class="content">
            <div class="column-responsive justify-content-center">
                <div class="justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <h1><?= 'Cupón: '.$cupon->codigo ?></h1>
                            <table style="width: 100%">
                                <tr>
                                    <th><?= __('Código') ?></th>
                                    <td><?= h($cupon->codigo) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Porcentaje de descuento') ?></th>
                                    <td><?= $this->Number->format($cupon->porcentaje).'%' ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Mínimo de compra') ?></th>
                                    <td><?= '$'.$this->Number->format($cupon->minimo) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Fecha Lanzamiento') ?></th>
                                    <td><?= h($cupon->fecha_lanzamiento) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Fecha Expiracion') ?></th>
                                    <td><?= h($cupon->fecha_expiracion) ?></td>
                                </tr>
                            </table>
                            <div class="related">
                                <h2><?= __('Pedidos con cupón') ?></h2>
                                <?php if (!empty($cupon->pedido)) : ?>
                                    <div class="table-responsive">
                                        <table>
                                            <tr>
                                                <th><?= __('Múmero de pedido') ?></th>
                                                <th><?= __('Cliente') ?></th>
                                            </tr>
                                            <?php foreach ($cupon->pedido as $pedido) : ?>
                                                <tr>
                                                    <td><?= h($pedido->id) ?></td>
                                                    <td><?= h($pedido->cliente->usuario) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="related">
                                <div class="side-nav">
                                    <?= $this->Html->link('<i class="fas fa-pen pr-2"></i>Editar Cupón', ['action' => 'edit', $cupon->id], ['escape' => false, 'class' => 'side-nav-item']) ?>
                                    <?= $this->Html->link('<i class="fas fa-list pr-2"></i>Ver Cupones', ['action' => 'index'], ['escape' => false, 'class' => 'side-nav-item']) ?>
                                    <?= $this->Html->link('<i class="fas fa-plus-circle pr-2"></i>Nuevo Cupón', ['action' => 'add'], ['escape' => false, 'class' => 'side-nav-item']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
