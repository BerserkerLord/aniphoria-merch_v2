<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Pedido'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pedido form content">
            <?= $this->Form->create($pedido) ?>
            <fieldset>
                <legend><?= __('Add Pedido') ?></legend>
                <?php
                    echo $this->Form->control('estatus_id', ['options' => $estatus]);
                    echo $this->Form->control('cliente_id', ['options' => $cliente, 'empty' => true]);
                    echo $this->Form->control('direccion_id', ['options' => $direccion]);
                    echo $this->Form->control('cupon_id', ['options' => $cupon, 'empty' => true]);
                    echo $this->Form->control('fecha');
                    echo $this->Form->control('merchandising._ids', ['options' => $merchandising]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
