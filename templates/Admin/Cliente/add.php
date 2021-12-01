<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav-actions">
            <?= $this->Html->link('<i class="fas fa-list pr-2"></i>Ver Clientes', ['action' => 'index'], ['escape' => false, 'class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="cliente form content">
            <?= $this->Form->create($cliente, ['type' => 'file']) ?>
            <fieldset>
                <h2><?= __('Añadir Cliente') ?></h2>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apaterno', ['label' => 'Apellido Paterno']);
                    echo $this->Form->control('amaterno', ['label' => 'Apellido Materno']);
                    echo $this->Form->control('fecha_nacimiento', ['label' => 'Fecha de Nacimiento  ']);
                    echo $this->Form->control('usuario');
                    echo $this->Form->control('telefono');
                    echo $this->Form->control('correo', ['type' => 'email']);
                    echo $this->Form->control('contrasenia', ['type' => 'password', 'label' => 'Contraseña']);
                    echo $this->Form->control('imagen', ['type' => 'file', 'label' => 'Fotografía']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
