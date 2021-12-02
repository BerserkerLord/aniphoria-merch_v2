<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchandising $merchandising
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav-actions">
            <?= $this->Html->link('<i class="fas fa-list pr-2"></i>Ver Mercancía', ['action' => 'index'], ['escape' => false, 'class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="merchandising form content">
            <?= $this->Form->create($merchandising, ['type' => 'file']) ?>
            <fieldset>
                <h2><?= __('Editar Artículo') ?></h2>
                <?php
                    echo $this->Form->control('categoria_id', ['options' => $categoria, 'label' => 'Categoría']);
                    echo $this->Form->control('articulo', ['label' => 'Artículo']);
                    echo $this->Form->control('detalles');
                    echo $this->Form->control('costo');
                    echo $this->Form->control('precio');
                    echo $this->Form->control('imagen[]', ['type' => 'file', 'multiple', 'label' => 'Imagenes']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
