<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cupon $cupon
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav-actions">
            <?= $this->Html->link('<i class="fas fa-list pr-2"></i>Ver Cupones', ['action' => 'index'], ['escape' => false, 'class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="cupon form content">
            <?= $this->Form->create($cupon) ?>
            <fieldset>
                <h2><?= __('Añadir Cupón') ?></h2>
                <?php
                    echo $this->Form->control('fecha_expiracion');
                    echo $this->Form->control('porcentaje', ['label' => 'Porcentaje de descuento']);
                    echo $this->Form->control('minimo', ['label' => 'Mínimo de compra']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
