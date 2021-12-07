<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador[]|\Cake\Collection\CollectionInterface $administrador
 */
?>
<div class="administrador index content">
    <?= $this->Html->link(__('Nuevo Administrador'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h2><?= __('Administradores') ?></h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __('Fotografia') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('usuario') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('correo') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($administrador as $administrador):
                    $hidden = false;
                    if($_SESSION['Auth']['id'] == $administrador->toArray()['id'] || $administrador->usuario == 'Admin_Principal'){
                        $hidden = true;
                    }
                ?>
                <tr>
                    <?php
                        $imageName = $administrador->foto;
                         if(!file_exists(WWW_ROOT.'/img/admins/'.$administrador->foto) || empty($administrador->foto)){
                            $imageName = 'default.jpg';
                        }
                    ?>
                    <td><?= $this->Html->image('/img/admins/'.$imageName, ['width' => '100', 'height' => '100', 'alt' => 'Imagen Admin', 'class' => 'rounded-circle']) ?></td>
                    <td><?= h($administrador->usuario) ?></td>
                    <td><?= h($administrador->correo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fas fa-eye pr-2"></i>', ['action' => 'view', $administrador->id], ['escape' => false, 'title' => 'Ver Administrador']) ?>
                        <?= $this->Html->link('<i class="fas fa-pen pr-2"></i>', ['action' => 'edit', $administrador->id], ['escape' => false, 'title' => 'Editar Administrador']) ?>
                        <?= $this->Form->postLink('<i class="fas fa-trash pr-2"></i>', ['action' => 'delete', $administrador->id], ['confirm' => __('¿Seguro que desea hacer la eliminación?', $administrador->id), 'escape' => false, 'title' => 'Eliminar Administrador', 'hidden' => $hidden]) ?>
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
