<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador $administrador
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav-actions">
            <?= $this->Form->postLink(
                '<i class="fas fa-trash pr-2"></i>Eliminar Administrador',
                ['action' => 'delete', $administrador->id],
                ['confirm' => __('¿Seguro que desea hacer la eliminación?', $administrador->id), 'escape' => false, 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link('<i class="fas fa-list pr-2"></i>Ver Administradores', ['action' => 'index'], ['escape' => false, 'class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="administrador form content">
            <?= $this->Form->create($administrador, ['type' => 'file']) ?>
            <fieldset>
                <h2><?= __('Editar Administrador') ?></h2>
                <?php
                    echo $this->Form->control('usuario');
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
