<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fabricante $fabricante
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Fabricante'), ['action' => 'edit', $fabricante->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Fabricante'), ['action' => 'delete', $fabricante->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fabricante->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Fabricante'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Fabricante'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fabricante view content">
            <h3><?= h($fabricante->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Rfc') ?></th>
                    <td><?= h($fabricante->rfc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Razon Social') ?></th>
                    <td><?= h($fabricante->razon_social) ?></td>
                </tr>
                <tr>
                    <th><?= __('Direccion') ?></th>
                    <td><?= h($fabricante->direccion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fabricante->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono') ?></th>
                    <td><?= $this->Number->format($fabricante->telefono) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
