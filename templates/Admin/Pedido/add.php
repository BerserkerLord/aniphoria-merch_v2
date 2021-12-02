<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav-actions">
            <?= $this->Html->link('<i class="fas fa-list pr-2"></i>Ver Pedidos', ['action' => 'index'], ['escape' => false, 'class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="pedido form content">
            <?= $this->Form->create($pedido) ?>
            <fieldset>
                <h2><?= __('Añadir Pedido') ?></h2>
                <?php
                    echo $this->Form->control('estatus_id', ['options' => $estatus, 'label' => 'Estatús']);
                    echo $this->Form->control('cliente_id', ['options' => $cliente]);
                    echo $this->Form->control('direccion_id', ['options' => $direccion, 'label' => 'Dirección']);
                    echo $this->Form->control('cupon_id', ['options' => $cupon, 'empty' => true, 'label' => 'Cupón']);
                    echo $this->Form->control('fecha');
                    echo $this->Form->control('merchandising._ids', ['options' => $merchandising, 'label' => 'Artículos']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
