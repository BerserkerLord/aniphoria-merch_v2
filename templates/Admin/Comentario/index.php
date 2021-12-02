<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comentario[]|\Cake\Collection\CollectionInterface $comentario
 */
?>
<div class="comentario index content">
    <h2><?= __('Comentario') ?></h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="actions"><?= $this->Paginator->sort('merchandising_id') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('cliente_id') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('calificacion', 'Calificación') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comentario as $comentario): ?>
                <tr>
                    <td class="tables-link"><?= $comentario->has('merchandising') ? $this->Html->link($comentario->merchandising->articulo, ['controller' => 'Merchandising', 'action' => 'view', $comentario->merchandising->id]) : '' ?></td>
                    <td class="tables-link"><?= $comentario->has('cliente') ? $this->Html->link($comentario->cliente->usuario, ['controller' => 'Cliente', 'action' => 'view', $comentario->cliente->id]) : '' ?></td>
                    <td class="actions"><?= $this->Number->format($comentario->calificacion).'/10' ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fas fa-eye pr-2"></i>', ['action' => 'view', $comentario->id], ['escape' => false,]) ?>
                        <?= $this->Form->postLink('<i class="fas fa-trash pr-2"></i>', ['action' => 'delete', $comentario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comentario->id), 'escape' => false,]) ?>
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
