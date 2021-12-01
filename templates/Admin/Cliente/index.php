<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $cliente
 */
?>
<div class="cliente index content">
    <?= $this->Html->link(__('Nuevo Cliente'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h2><?= __('Cliente') ?></h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="actions"><?= __('Fotografía') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('verificado') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('nombre') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('apaterno', 'A. Paterno') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('amaterno', 'A. Materno') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('fecha_nacimiento', 'F. de nacimiento') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('fecha_registro', 'F. de registro') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('usuario') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('correo') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('estatus') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cliente as $cliente): ?>
                <tr>
                    <?php $imageName=empty($cliente->foto)?'default.jpg':$cliente->foto; ?>
                    <td><?= @$this->Html->image('/webroot/img/clientes/'.$imageName, ['width' => '100', 'height' => '100', 'alt' => 'Imagen Cliente', 'class' => 'rounded-circle']) ?></td>
                    <td><?= $cliente->verificado ? __('Si') : __('No'); ?></td>
                    <td><?= h($cliente->nombre) ?></td>
                    <td><?= h($cliente->apaterno) ?></td>
                    <td><?= h($cliente->amaterno) ?></td>
                    <td><?= h($cliente->fecha_nacimiento) ?></td>
                    <td><?= h($cliente->fecha_registro) ?></td>
                    <td><?= h($cliente->usuario) ?></td>
                    <td><?= h($cliente->correo) ?></td>
                    <td><?= $cliente->estatus ? __('Activo') : __('Inactivo'); ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fas fa-eye pr-2"></i>', ['action' => 'view', $cliente->id], ['escape' => false, 'title' => 'Ver Cliente']) ?>
                        <?= $this->Html->link('<i class="fas fa-pen pr-2"></i>', ['action' => 'edit', $cliente->id], ['escape' => false, 'title' => 'Editar Cliente']) ?>
                        <?= $this->Form->postLink('<i class="fas fa-trash pr-2"></i>', ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id), 'escape' => false]) ?>
                        <?php
                        if($cliente['estatus'] == 1){
                            ?>
                            <?= $this->Form->postLink('<i class="fas fa-ban pr-2"></i>', ['action' => 'ban', $cliente->id], ['confirm' => __('¿Seguro que desea inhabilitar al cliente?', $cliente->id), 'escape' => false,  'title' => 'Deshabilitar Cliente']) ?>
                            <?php
                        } else {
                            ?>
                            <?= $this->Form->postLink('<i class="fas fa-arrow-circle-up pr-2"></i>', ['action' => 'enable', $cliente->id], ['confirm' => __('¿Seguro que desea habilitar al cliente?', $cliente->id), 'escape' => false,  'title' => 'Habilitar Cliente']) ?>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página{{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} en total')) ?></p>
    </div>
</div>
