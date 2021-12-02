<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchandising $merchandising
 */
?>
<div class="row">
    <div class="column-responsive justify-content-center">
        <div class="content">
            <div class="column-responsive justify-content-center">
                <div class="justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <table style="width: 100%">
                                <tr>
                                    <th><?= __('Categoría') ?></th>
                                    <td><?=  h($merchandising->categorium->categoria) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Articulo') ?></th>
                                    <td><?= h($merchandising->articulo) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Costo') ?></th>
                                    <td><?= '$'.$this->Number->format($merchandising->costo) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Precio') ?></th>
                                    <td><?= '$'.$this->Number->format($merchandising->precio) ?></td>
                                </tr>
                            </table>
                            <div class="text">
                                <strong><?= __('Detalles') ?></strong>
                                <blockquote>
                                    <?= $this->Text->autoParagraph(h($merchandising->detalles)); ?>
                                </blockquote>
                            </div>
                            <div class="related">
                                <h2><?= __('Banco de Imagenes') ?></h2>
                                <?php if (!empty($merchandising->imagen)) : ?>
                                    <table class="table table-responsive-lg table-hover">
                                        <tr>
                                            <th><?= __('Imagen') ?></th>
                                            <th><?= __('Acciones') ?></th>
                                        </tr>
                                        <?php foreach ($merchandising->imagen as $img) : ?>
                                            <?php $imageName=file_exists('/webroot/img/productos/'.$img->nombre)?$img->nombre:'default.png'; ?>
                                            <tr>
                                                <td><?= @$this->Html->image('/webroot/img/productos/'.$img->nombre, ['width' => '100', 'height' => '100']) ?></td>
                                                <td class="tables-link">
                                                    <?= $this->Form->postLink('Eliminar', ['controller' => 'Imagen', 'action' => 'delete', $img->id], ['confirm' => __('¿Seguro que desea aliminar la imagen?', $img->id)]) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                <?php endif; ?>
                            </div>
                            <div class="side-nav related">
                                <?= $this->Html->link('<i class="fas fa-list pr-2"></i>Ver Artículos', ['action' => 'index'], ['escape' => false, 'class' => 'side-nav-item']) ?>
                                <?= $this->Html->link('<i class="fas fa-plus-circle pr-2"></i>Nuevo Artículo', ['action' => 'add'], ['escape' => false, 'class' => 'side-nav-item']) ?>
                                <?php
                                    if($merchandising['estatus'] == 1){
                                        ?>
                                        <?= $this->Form->postLink('<i class="fas fa-ban pr-2"></i>Desahabilitar Artículo', ['action' => 'ban', $merchandising->id], ['confirm' => __('¿Seguro que desea deshabilitar al artículo?', $merchandising->id), 'escape' => false,  'title' => 'Deshabilitar Artículo']) ?>
                                        <?php
                                    } else {
                                        ?>
                                        <?= $this->Form->postLink('<i class="fas fa-arrow-circle-up pr-2"></i>Habilitar Artículo', ['action' => 'enable', $merchandising->id], ['confirm' => __('¿Seguro que desea habilitar al artículo?', $merchandising->id), 'escape' => false,  'title' => 'Habilitar Artículo']) ?>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
