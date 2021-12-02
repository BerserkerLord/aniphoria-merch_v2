<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="column-responsive justify-content-center">
        <div class="compra form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <h2><?= __('Cantidades') ?></h2>
                <?php
                    foreach (json_decode($_COOKIE['compra'], true)['merchandising'] as $key=>$compra):
                        echo $this->Form->label('cantidadlbl', 'Cantidad de '.$compra['articulo']);
                        echo $this->Form->number(''.$key);
                    endforeach;
                    setcookie('merch', $_COOKIE['compra'], time()+10);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
