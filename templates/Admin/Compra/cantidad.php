<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="compra form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Cantidades') ?></legend>
                <?php 
                    
                    foreach (json_decode($_COOKIE['compra'], true)['merchandising'] as $key=>$compra): 
                        echo $this->Form->label('cantidadlbl', 'Cantidad '.$compra['articulo']);
                        echo $this->Form->number(''.$key);
                    endforeach;
                    setcookie('merch', $_COOKIE['compra'], time()+10);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
        
    </div>
</div>