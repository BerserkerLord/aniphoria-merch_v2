<?php
if (!$cart->isEmpty()) {
    $allItems = $cart->getItems();
}

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido[]|\Cake\Collection\CollectionInterface $pedido
 */

?>

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card single-accordion">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Dirección de envío
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="shipping-address-form">
                                        <p>Your shipping address form is here.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card single-accordion">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Detalles de Pago
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="card-details">
                                        <p>Your card details goes here.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="order-details-wrap">
                    <table class="order-details">
                        <thead>
                        <tr>
                            <th>Detalle de compra</th>
                            <th>Precio</th>
                        </tr>
                        </thead>
                        <tbody class="order-details-body">
                        <?php
                        $subtotal = 0;
                        foreach ($allItems as $id => $items) {
                        foreach ($items as $item) {
                        foreach ($merchandising as $merch) {
                            if ($id == $merch->id) {
                                break;
                            }
                        }
                        ?>
                            <tr>
                                <td><?= ($merch -> articulo . ' x' . $item['quantity']) ?></td>
                                <td><?= ('$'.($item['quantity'] * $item['attributes']['price'])) ?></td>
                                <?php $subtotal +=  $item['quantity'] * $item['attributes']['price'] ?>
                            </tr>
                        <?php
                            }
                        }
                        ?>

                        <tr>
                            <td>Producto</td>
                            <td>Total</td>
                        </tr>
                        </tbody>
                        <tbody class="checkout-details">
                        <tr>
                            <td>Subtotal</td>
                            <td><?= '$'.$subtotal ?></td>
                        </tr>
                        <tr>
                            <td>Envío</td>
                            <td>$50</td>
                        </tr>
                        <tr>
                            <td>IVA</td>
                            <td><?= '$'.number_format($subtotal*0.16,2) ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td><?= '$'.number_format($subtotal + $subtotal*0.16 + 50, 2) ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="#" class="boxed-btn">Comprar owo</a>
                </div>
            </div>
        </div>
    </div>
</div>
