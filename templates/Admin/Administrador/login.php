<?php setcookie('rol', 'admin', time() + 20000000); ?>
<div class="users form content col-md-4 container-fluid">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor ingrese su correo y su contraseña de administrador ') ?></legend>
        <?= $this->Form->control('email', ['label' => 'Correo electronico']) ?>
        <?= $this->Form->control('password', ['label' => 'Contraseña']) ?>
    </fieldset>
    <?= $this->Form->button(__('Acceder')); ?>
    <?= $this->Form->end() ?>
</div>
