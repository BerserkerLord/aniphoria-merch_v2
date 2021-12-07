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
                                        <?= $this->Form->control('direccion_id', ['options' => $direcciones, 'label' => 'Dirección']); ?>
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
                                        <?= $this->Form->create(null, [
                                            "action" => 'payment',
                                            "method" => "post",
                                            "class" => "require-validation",
                                            "data-cc-on-file" => "false",
                                            "data-stripe-publishable-key" => STRIPE_KEY,
                                            "id" => "payment-form"
                                        ]) ?>
                                        <div class="panel-body">
                                            <div class='form-row row'>
                                                <div class='col-xs-12 form-group required'>
                                                    <label class='control-label'>Name on Card</label> <input
                                                        class='form-control' size='4' type='text'>
                                                </div>
                                            </div>

                                            <div class='form-row row'>
                                                <div class='col-xs-12 form-group card required'>
                                                    <label class='control-label'>Card Number</label> <input
                                                        autocomplete='off' class='form-control card-number' size='20'
                                                        type='text'>
                                                </div>
                                            </div>

                                            <div class='form-row row'>
                                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                                                                    type='text'>
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Month</label> <input
                                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                                        type='text'>
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Year</label> <input
                                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                        type='text'>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($70)</button>
                                                </div>
                                            </div>

                                            <?= $this->Form->end() ?>
                                        </div>


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {
        var $form=$(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form         = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>
