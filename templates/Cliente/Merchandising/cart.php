<?php
if (!$cart->isEmpty()) {
    $allItems = $cart->getItems();
?>

<div class="content">
    <h2><?= __('Carrito de compras') ?></h2>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= __('Imagen') ?></th>
                <th class="actions">Articulo</th>
                <th class="actions">Cantidad</th>
                <th class="actions">Precio</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($allItems as $id => $items) {
                    foreach ($items as $item) {
                        foreach ($merchandising as $merch) {
                            if ($id == $merch->id) {
                        break;
                    }
                }
            ?>
                <tr>
                    <?php $imageName=empty($merch->imagen[0]->nombre)?'default.jpg':$merch->imagen[0]->nombre; ?>
                    <td><?= @$this->Html->image('/webroot/img/productos/'.$imageName, ['width' => '100', 'height' => '100', 'alt' => 'Imagen Articulo']) ?></td>
                    <td><?= h($merch->articulo) ?></td>
                    <td><?= h($item['quantity']) ?></td>
                    <td><?= h($item['attributes']['price']) ?></td>
                </tr>
            <?php
                }
            }
            ?>
            </tbody>
        </table>
        <div class="text-right">
            <h3>Total:<br /><?= '$' . number_format($cart->getAttributeTotal('price'), 2, '.', ',') ?></h3>
        </div>
        <p>
        <div class="pull-left">
            <button class="btn btn-danger btn-empty-cart">Empty Cart</button>
        </div>
        <div class="pull-right text-right">
            <a href="?a=home" class="btn btn-default">Continue Shopping</a>
            <a href="?a=checkout" class="btn btn-danger">Checkout</a>
        </div>
        </p>
    </div>
</div>

<?php } ?>
