<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="column-responsive justify-content-center">
        <div class="pedido form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <h2><?= __('Cantidades') ?></h2>
                <?php
                    foreach (json_decode($_COOKIE['pedido'], true)['merchandising'] as $key=>$pedido):
                        echo $this->Form->label('cantidadlbl', 'Cantidad de '.$pedido['articulo']);
                        echo $this->Form->number(''.$key);
                    endforeach;
                setcookie('merch', $_COOKIE['pedido'], time()+10);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>

    </div>
</div>
