<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fabricante $fabricante
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Fabricante'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="fabricante form content">
            <?= $this->Form->create($fabricante) ?>
            <fieldset>
                <legend><?= __('Add Fabricante') ?></legend>
                <?php
                    echo $this->Form->control('rfc');
                    echo $this->Form->control('razon_social');
                    echo $this->Form->control('direccion');
                    echo $this->Form->control('telefono');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
