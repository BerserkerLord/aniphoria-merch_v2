<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="row">
    <div class="users form content col-md-5 container-fluid">
        <div class="cliente form content">
            <?= $this->Form->create($cliente, ['type' => 'file']) ?>
            <fieldset>
                <h2><?= __('Datos del cliente') ?></h2>
                <tr>
                    <?php $imageName=empty($cliente->foto)?'default.jpg':$cliente->foto; ?>
                    <?= @$this->Html->image('/img/clientes/'.$imageName, ['width' => '250', 'height' => '250', 'alt' => 'Imagen Admin', 'class' => 'rounded-circle']) ?>
                </tr>
                <?php
                echo $this->Form->control('nombre');
                echo $this->Form->control('apaterno', ['label' => 'Apellido Paterno']);
                echo $this->Form->control('amaterno', ['label' => 'Apellido Materno']);
                echo $this->Form->control('fecha_nacimiento', ['label' => 'Fecha de Nacimiento']);
                echo $this->Form->control('usuario');
                echo $this->Form->control('telefono');
                echo $this->Form->control('correo', ['type' => 'email']);
                //echo $this->Form->control('contrasenia', ['type' => 'password', 'label' => 'Contraseña']);
                echo $this->Form->control('imagen', ['type' => 'file', 'label' => 'Fotografia']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
