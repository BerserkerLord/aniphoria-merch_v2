<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador $administrador
 */
?>
<div class="row">
    <div class="column-responsive justify-content-center">
        <div class="content">
            <div class="column-responsive justify-content-center">
                <div class="justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <h1><?= 'Administrador: '.$administrador->usuario ?></h1>
                            <table style="width: 100%">
                                <tr>
                                    <?php $imageName=empty($administrador->foto)?'default.jpg':$administrador->foto; ?>
                                    <?= @$this->Html->image('/img/admins/'.$imageName, ['width' => '250', 'height' => '250', 'alt' => 'Imagen Admin', 'class' => 'rounded-circle']) ?>
                                </tr>
                                <tr>
                                    <th><?= __('Nombre de usuario') ?></th>
                                    <td><?= h($administrador->usuario) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Correo electrónico') ?></th>
                                    <td><?= h($administrador->correo) ?></td>
                                </tr>
                            </table>
                            <div class="side-nav">
                                <?= $this->Html->link('<i class="fas fa-pen pr-2"></i>Editar Administrador', ['action' => 'edit', $administrador->id], ['escape' => false, 'class' => 'side-nav-item']) ?>
                                <?= $this->Form->postLink('<i class="fas fa-trash pr-2"></i>Eliminar Administrador', ['action' => 'delete', $administrador->id], ['confirm' => __('¿Seguro que desea hacer la eliminación?', $administrador->id), 'escape' => false, 'class' => 'side-nav-item']) ?>
                                <?= $this->Html->link('<i class="fas fa-list pr-2"></i>Ver Administradores', ['action' => 'index'], ['escape' => false, 'class' => 'side-nav-item']) ?>
                                <?= $this->Html->link('<i class="fas fa-plus-circle pr-2"></i>Nuevo Administrador', ['action' => 'add'], ['escape' => false, 'class' => 'side-nav-item']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
