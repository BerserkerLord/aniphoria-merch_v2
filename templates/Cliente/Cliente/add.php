<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="row">
    <div class="column-responsive justify-content-center">
        <div class="cliente form content">
            <?= $this->Form->create($cliente, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Cliente') ?></legend>
                <?php
                echo $this->Form->control('nombre', ['label' => 'Nombre']);
                echo $this->Form->control('apaterno', ['label' => 'Apellido Paterno']);
                echo $this->Form->control('amaterno', ['label' => 'Apellido Materno']);
                echo $this->Form->control('fecha_nacimiento', ['label' => 'Fecha de Nacimiento  ']);
                echo $this->Form->control('usuario', ['label' => 'Usuario']);
                echo $this->Form->control('telefono', ['label' => 'telefono']);
                echo $this->Form->control('correo', ['type' => 'email', 'label' => 'Correo Electrónico']);
                echo $this->Form->control('contrasenia', ['type' => 'password', 'label' => 'Contraseña']);
                echo $this->Form->control('imagen', ['type' => 'file', 'label' => 'Fotografía']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Registrar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
