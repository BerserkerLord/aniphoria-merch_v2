<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador $administrador
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Administrador'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="administrador form content">
            <?= $this->Form->create($administrador, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Administrador') ?></legend>
                <?php
                    echo $this->Form->control('usuario');
                    echo $this->Form->control('correo', ['type' => 'email']);
                    echo $this->Form->control('contrasenia', ['type' => 'password']);
                    echo $this->Form->control('foto', ['type' => 'file']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
