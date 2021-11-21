<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador $administrador
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Administrador'), ['action' => 'edit', $administrador->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Administrador'), ['action' => 'delete', $administrador->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrador->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Administrador'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Administrador'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="administrador view content">
            <h3><?= h($administrador->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Token') ?></th>
                    <td><?= h($administrador->token) ?></td>
                </tr>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= h($administrador->usuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Correo') ?></th>
                    <td><?= h($administrador->correo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contrasenia') ?></th>
                    <td><?= h($administrador->contrasenia) ?></td>
                </tr>
                <tr>
                    <th><?= __('Foto') ?></th>
                    <td><?= @$this->Html->image('/webroot/img/admins/'.$administrador->foto, ['width' => '100', 'height' => '100']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($administrador->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
