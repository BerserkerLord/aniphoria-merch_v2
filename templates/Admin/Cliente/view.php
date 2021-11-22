<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cliente'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cliente'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="cliente view content">
            <h3><?= h($cliente->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($cliente->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apaterno') ?></th>
                    <td><?= h($cliente->apaterno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amaterno') ?></th>
                    <td><?= h($cliente->amaterno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Token') ?></th>
                    <td><?= h($cliente->token) ?></td>
                </tr>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= h($cliente->usuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Correo') ?></th>
                    <td><?= h($cliente->correo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contrasenia') ?></th>
                    <td><?= h($cliente->contrasenia) ?></td>
                </tr>
                <tr>
                    <th><?= __('Foto') ?></th>
                    <td><?= h($cliente->foto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cliente->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Nacimiento') ?></th>
                    <td><?= h($cliente->fecha_nacimiento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Registro') ?></th>
                    <td><?= @$this->Html->image('/webroot/img/clientes/'.$cliente->foto, ['width' => '100', 'height' => '100']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Verificado') ?></th>
                    <td><?= $cliente->verificado ? __('Si') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
