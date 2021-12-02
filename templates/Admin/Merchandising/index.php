<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchandising[]|\Cake\Collection\CollectionInterface $merchandising
 */
?>
<div class="merchandising index content">
    <?= $this->Html->link(__('Nuevo Artículo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h2><?= __('Merchandising') ?></h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="actions"><?= __('Categoría') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('articulo', 'Artículo') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('costo') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('precio') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('estatus', 'Estatús') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($merchandising as $merchandising): ?>
                <tr>
                    <td class="tables-link"><?= $merchandising->has('categorium') ? $this->Html->link($merchandising->categorium->categoria, ['controller' => 'Categoria', 'action' => 'view', $merchandising->categorium->id]) : '' ?></td>
                    <td><?= h($merchandising->articulo) ?></td>
                    <td><?= '$'.$this->Number->format($merchandising->costo) ?></td>
                    <td><?= '$'.$this->Number->format($merchandising->precio) ?></td>
                    <td><?= $merchandising->estatus ? __('Activo') : __('Inactivo'); ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fas fa-eye pr-2"></i>', ['action' => 'view', $merchandising->id], ['escape' => false]) ?>
                        <?= $this->Html->link('<i class="fas fa-pen pr-2"></i>', ['action' => 'edit', $merchandising->id], ['escape' => false]) ?>
                        <?php
                            if($merchandising['estatus'] == 1){
                                ?>
                                <?= $this->Form->postLink('<i class="fas fa-ban pr-2"></i>', ['action' => 'ban', $merchandising->id], ['confirm' => __('¿Seguro que desea inhabilitar al artículo?', $merchandising->id), 'escape' => false,  'title' => 'Deshabilitar Artículo']) ?>
                                <?php
                            } else {
                                ?>
                                <?= $this->Form->postLink('<i class="fas fa-arrow-circle-up pr-2"></i>', ['action' => 'enable', $merchandising->id], ['confirm' => __('¿Seguro que desea habilitar al artículo?', $merchandising->id), 'escape' => false,  'title' => 'Habilitar Artículo']) ?>
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
