<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Direccion $direccion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Direccion'), ['action' => 'edit', $direccion->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Direccion'), ['action' => 'delete', $direccion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $direccion->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Direccion'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Direccion'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="direccion view content">
            <h3><?= h($direccion->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($direccion->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cliente Id') ?></th>
                    <td><?= $this->Number->format($direccion->cliente_id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Direccion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($direccion->direccion)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
