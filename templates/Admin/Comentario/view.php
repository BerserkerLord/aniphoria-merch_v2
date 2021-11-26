<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comentario $comentario
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Comentario'), ['action' => 'edit', $comentario->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Comentario'), ['action' => 'delete', $comentario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comentario->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Comentario'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Comentario'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="comentario view content">
            <h3><?= h($comentario->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Merchandising') ?></th>
                    <td><?= $comentario->has('merchandising') ? $this->Html->link($comentario->merchandising->articulo, ['controller' => 'Merchandising', 'action' => 'view', $comentario->merchandising->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cliente') ?></th>
                    <td><?= $comentario->has('cliente') ? $this->Html->link($comentario->cliente->usuario, ['controller' => 'Cliente', 'action' => 'view', $comentario->cliente->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($comentario->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Calificacion') ?></th>
                    <td><?= $this->Number->format($comentario->calificacion) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Comentario') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($comentario->comentario)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
