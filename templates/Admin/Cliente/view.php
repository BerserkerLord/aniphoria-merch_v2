<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="row">
    <div class="column-responsive justify-content-center">
        <div class="content">
            <div class="column-responsive justify-content-center">
                <div class="justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <h1><?= 'Cliente: '.h($cliente->usuario) ?></h1>
                            <table style="width: 100%">
                                <tr>
                                    <?php $imageName=empty($cliente->foto)?'default.jpg':$cliente->foto; ?>
                                    <?= @$this->Html->image('/webroot/img/clientes/'.$imageName, ['width' => '250', 'height' => '250', 'alt' => 'Imagen Admin', 'class' => 'rounded-circle']) ?>
                                </tr>
                                <tr>
                                    <th><?= __('Nombre') ?></th>
                                    <td><?= h($cliente->nombre) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Apellido paterno') ?></th>
                                    <td><?= h($cliente->apaterno) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Apellido materno') ?></th>
                                    <td><?= h($cliente->amaterno) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Fecha de Nacimiento') ?></th>
                                    <td><?= h($cliente->fecha_nacimiento) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Fecha de Registro') ?></th>
                                    <td><?= h($cliente->fecha_registro) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Nombre de usuario') ?></th>
                                    <td><?= h($cliente->usuario) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Correo electrónico') ?></th>
                                    <td><?= h($cliente->correo) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Estatús') ?></th>
                                    <td><?= $cliente->estatus ? __('Habilitado') : __('Inhabilitado'); ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Verificado') ?></th>
                                    <td><?= $cliente->verificado ? __('Si') : __('No'); ?></td>
                                </tr>
                            </table>
                            <div class="side-nav">
                                <?= $this->Html->link('<i class="fas fa-pen pr-2"></i>Editar Cliente', ['action' => 'edit', $cliente->id], ['escape' => false, 'class' => 'side-nav-item']) ?>
                                <?= $this->Html->link('<i class="fas fa-list pr-2"></i>Ver Clientes', ['action' => 'index'], ['escape' => false, 'class' => 'side-nav-item']) ?>
                                <?= $this->Html->link('<i class="fas fa-plus-circle pr-2"></i>Nuevo Cliente', ['action' => 'add'], ['escape' => false, 'class' => 'side-nav-item']) ?>
                                <?php
                                    if($cliente['estatus'] == 1){
                                ?>
                                        <?= $this->Form->postLink('<i class="fas fa-ban pr-2"></i>Desahabilitar Cliente', ['action' => 'ban', $cliente->id], ['confirm' => __('¿Seguro que desea deshabilitar al cliente?', $cliente->id), 'escape' => false,  'title' => 'Deshabilitar Categoría']) ?>
                                        <?php
                                    } else {
                                        ?>
                                        <?= $this->Form->postLink('<i class="fas fa-arrow-circle-up pr-2"></i>Habilitar Cliente', ['action' => 'enable', $cliente->id], ['confirm' => __('¿Seguro que desea habilitar al cliente?', $cliente->id), 'escape' => false,  'title' => 'Habilitar Categoría']) ?>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
