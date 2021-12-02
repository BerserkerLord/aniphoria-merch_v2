<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Direccion[]|\Cake\Collection\CollectionInterface $direccion
 */
?>
<div class="direccion index content">
    <?= $this->Html->link(__('Nueva Dirección'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h2><?= __('Direcciones') ?></h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __('Nombre del cliente') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('direccion', 'Dirección') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('estatus', 'Estatús') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($direccion as $direccion): ?>
                <tr>
                    <td><?= h($direccion->cliente->nombre.' '.$direccion->cliente->apaterno.' '.$direccion->cliente->amaterno) ?></td>
                    <td><?= h($direccion->direccion) ?></td>
                    <td><?= $direccion->estatus ? __('Activa') : __('Inactiva'); ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fas fa-pen pr-2"></i>', ['action' => 'edit', $direccion->id], ['escape' => false]) ?>
                        <?php
                            if($direccion['estatus'] == 1){
                                ?>
                                <?= $this->Form->postLink('<i class="fas fa-ban pr-2"></i>', ['action' => 'ban', $direccion->id], ['confirm' => __('¿Seguro que desea inhabilitar dirección?', $direccion->id), 'escape' => false,  'title' => 'Deshabilitar Dirección']) ?>
                                <?php
                            } else {
                                ?>
                                <?= $this->Form->postLink('<i class="fas fa-arrow-circle-up pr-2"></i>', ['action' => 'enable', $direccion->id], ['confirm' => __('¿Seguro que desea habilitar al dirección?', $direccion->id), 'escape' => false,  'title' => 'Habilitar Dirección']) ?>
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
