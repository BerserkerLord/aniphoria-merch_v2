<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador[]|\Cake\Collection\CollectionInterface $administrador
 */
?>
<div class="administrador index content">
    <?= $this->Html->link(__('New Administrador'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Administrador') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('usuario') ?></th>
                    <th><?= $this->Paginator->sort('correo') ?></th>
                    <th><?= $this->Paginator->sort('foto') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($administrador as $administrador): ?>
                <tr>
                    <td><?= $this->Number->format($administrador->id) ?></td>
                    <td><?= h($administrador->usuario) ?></td>
                    <td><?= h($administrador->correo) ?></td>
                    <?php $imageName=empty($administrador->foto)?'default.jpg':$administrador->foto; ?>
                    <td><?= @$this->Html->image('/webroot/img/admins/'.$imageName, ['width' => '100', 'height' => '100']) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $administrador->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $administrador->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $administrador->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrador->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
