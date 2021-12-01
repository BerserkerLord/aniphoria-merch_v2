<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comentario $comentario
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
                                <tr class="tables-link">
                                    <th><?= __('Artículo') ?></th>
                                    <td><?= $comentario->has('merchandising') ? $this->Html->link($comentario->merchandising->articulo, ['controller' => 'Merchandising', 'action' => 'view', $comentario->merchandising->id]) : '' ?></td>
                                </tr>
                                <tr class="tables-link">
                                    <th><?= __('Cliente') ?></th>
                                    <td><?= $comentario->has('cliente') ? $this->Html->link($comentario->cliente->usuario, ['controller' => 'Cliente', 'action' => 'view', $comentario->cliente->id]) : '' ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Calificacion') ?></th>
                                    <td><?= $this->Number->format($comentario->calificacion).'/10' ?></td>
                                </tr>
                                <tr>
                                    <strong><?= __('Comentario') ?></strong>
                                    <blockquote>
                                        <?= $this->Text->autoParagraph(h($comentario->comentario)); ?>
                                    </blockquote>
                                </tr>
                            </table>
                            <div class="side-nav">
                                <?= $this->Form->postLink('<i class="fas fa-trash pr-2"></i>Eliminar Comentario', ['action' => 'delete', $comentario->id], ['confirm' => __('¿Seguro que desea hacer la eliminación?', $comentario->id), 'escape' => false, 'class' => 'side-nav-item']) ?>
                                <?= $this->Html->link('<i class="fas fa-list pr-2"></i>Ver Comentarios', ['action' => 'index'], ['escape' => false, 'class' => 'side-nav-item']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
