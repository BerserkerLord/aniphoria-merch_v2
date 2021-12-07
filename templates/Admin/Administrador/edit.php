<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador $administrador
 */
$hidden = false;
$disable = '';
if($_SESSION['Auth']['id'] == $administrador->toArray()['id']){
    $hidden = true;
}
if($_SESSION['Auth']['usuario'] != 'Admin_Principal'){
    $disable = 'disabled';
}

?>
<div class="row">
    <aside class="column">
        <div class="side-nav-actions">
            <?= $this->Form->postLink(
                '<i class="fas fa-trash pr-2"></i>Eliminar Administrador',
                ['action' => 'delete', $administrador->id],
                ['confirm' => __('¿Seguro que desea hacer la eliminación?', $administrador->id), 'escape' => false, 'class' => 'side-nav-item', 'hidden' => $hidden]
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
                    echo $this->Form->control('usuario', [$disable]);
                    echo $this->Form->control('correo', ['type' => 'email', $disable]);
                    //echo $this->Form->control('contrasenia', ['type' => 'password', 'label' => 'Contraseña']);
                    echo $this->Form->control('imagen', ['type' => 'file', 'label' => 'Fotografia', $disable]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar'), [$disable]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
