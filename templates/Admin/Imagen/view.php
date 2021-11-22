<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Imagen $imagen
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Imagen'), ['action' => 'edit', $imagen->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Imagen'), ['action' => 'delete', $imagen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagen->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Imagen'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Imagen'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="imagen view content">
            <h3><?= h($imagen->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Merchandising') ?></th>
                    <td><?= $imagen->has('merchandising') ? $this->Html->link($imagen->merchandising->id, ['controller' => 'Merchandising', 'action' => 'view', $imagen->merchandising->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Imagen') ?></th>
                    <td><?= h($imagen->imagen) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($imagen->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
