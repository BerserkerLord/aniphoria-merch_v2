<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
$metodo = 'Efectivo';
if(!$pedido['metodo']){
    $metodo = 'Tarjeta';
}
?>
<table class="body-wrap">
    <tbody>
    <tr>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td class="content-block">
                                        <span id="ani" size="50px">Ani</span><span id="phoria">Phoria</span>
                                        <h2>Factura de Pedido</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <br>Nombre del cliente<?= ': ' . $pedido['cliente']['nombre'].' '. $pedido['cliente']['apaterno'].' '.$pedido['cliente']['amaterno'] ?>
                                                    <br>Dirección de facturación<?= ': ' . $pedido['direccion']['direccion'] ?>
                                                    <br>E-Mail<?= ': ' . $pedido['cliente']['correo'] ?>
                                                    <br>Factura<?= ' #' . $pedido['id'] ?>
                                                    <br><?= $pedido['fecha'] ?>
                                                    <br>Estatus<?= ': ' . $pedido['estatus']['estatus'] ?>
                                                    <br>Metodo de pago: <?= $metodo ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <table class="invoice-items" cellpadding="0" cellspacing="0" style="padding-top: 3rem">
                                                    <thead>
                                                    <tr style="background-color: #FFFFFF">
                                                        <td>Código</td>
                                                        <td>Artículo</td>
                                                        <td class="line0 alignright">Cantidad</td>
                                                        <td class="line0 alignright">Costo</td>
                                                        <td class="line0 alignright">Monto</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $subtotal = 0;
                                                            $total = 0;
                                                            $descuento = 0;
                                                            foreach($pedido['merchandising'] as $key=>$merch){
                                                                $subtotal += $merch['costo'] * $merch['_joinData']['cantidad'];
                                                                $total_producto = $merch['costo'] * $merch['_joinData']['cantidad'];
                                                                ?>
                                                                <tr>
                                                                    <td class="line0"><?= $merch['id'] ?></td>
                                                                    <td class="line0"><?= $merch['articulo'] ?></td>
                                                                    <td class="line0 alignright"><?= $merch['_joinData']['cantidad'] ?></td>
                                                                    <td class="line0 alignright">$<?= number_format($merch['costo'], 2) ?></td>
                                                                    <td class="line0 alignright">$<?= number_format($total_producto, 2) ?></td>
                                                                </tr>
                                                                <?php
                                                                    if(isset($pedido['cupon'])){
                                                                        $descuento = ($subtotal*$pedido['cupon']['porcentaje'])/100;
                                                                    }
                                                                    $total = $subtotal - $descuento;
                                                            }
                                                            ?>
                                                        <tr class="total">
                                                            <td class="alignright" colspan="4">SubTotal</td>
                                                            <td class="alignright" colspan="4">$<?= number_format($subtotal, 2) ?></td>
                                                        </tr>
                                                        <tr class="total">
                                                            <td class="alignright" colspan="4">Descuento</td>
                                                            <td class="alignright" colspan="4">$<?= number_format($descuento, 2) ?></td>
                                                        </tr>
                                                        <tr class="Descuentos">
                                                            <td class="alignright" colspan="4">Total</td>
                                                            <td class="alignright" colspan="4">$<?= number_format($total, 2) ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        Aniphoria Merch
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </td>
    </tr>
    </tbody>
</table>
