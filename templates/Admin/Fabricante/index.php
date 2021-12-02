<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fabricante[]|\Cake\Collection\CollectionInterface $fabricante
 */
?>
<div class="fabricante index content">
    <?= $this->Html->link(__('Nuevo Fabricante'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h2><?= __('Fabricantes') ?></h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="actions"><?= $this->Paginator->sort('rfc', 'RFC') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('razon_social', 'Razón Social') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('direccion', 'Dirección') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('telefono', 'Teléfono') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('estatus', 'Estatús') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fabricante as $fabricante): ?>
                <tr>
                    <td><?= h($fabricante->rfc) ?></td>
                    <td><?= h($fabricante->razon_social) ?></td>
                    <td><?= h($fabricante->direccion) ?></td>
                    <td><?= H($fabricante->telefono) ?></td>
                    <td><?= $fabricante->estatus ? __('Activo') : __('Inactivo'); ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fas fa-pen pr-2"></i>', ['action' => 'edit', $fabricante->id], ['escape' => false]) ?>
                        <?php
                            if($fabricante['estatus'] == 1){
                                ?>
                                <?= $this->Form->postLink('<i class="fas fa-ban pr-2"></i>', ['action' => 'ban', $fabricante->id], ['confirm' => __('¿Seguro que desea inhabilitar al fabricante?', $fabricante->id), 'escape' => false,  'title' => 'Deshabilitar Fabricante']) ?>
                                <?php
                            } else {
                                ?>
                                <?= $this->Form->postLink('<i class="fas fa-arrow-circle-up pr-2"></i>', ['action' => 'enable', $fabricante->id], ['confirm' => __('¿Seguro que desea habilitar al fabricante?', $fabricante->id), 'escape' => false,  'title' => 'Habilitar Fabricante']) ?>
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
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} en total')) ?></p>
    </div>
</div>
