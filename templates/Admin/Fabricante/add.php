<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fabricante $fabricante
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav-actions">
            <?= $this->Html->link('<i class="fas fa-list pr-2"></i>Ver Fabricantes', ['action' => 'index'], ['escape' => false, 'class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="fabricante form content">
            <?= $this->Form->create($fabricante) ?>
            <fieldset>
                <h2><?= __('Añadir Fabricante') ?></h2>
                <?php
                    echo $this->Form->control('rfc', ['label' => 'RFC']);
                    echo $this->Form->control('razon_social', ['label' => 'Razón Social']);
                    echo $this->Form->control('direccion', ['label' => 'Dirección', 'type' => 'textarea']);
                    echo $this->Form->control('telefono', ['label' => 'Télefono', 'type' => 'text', 'max' => '15']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
