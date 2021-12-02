<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra $compra
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav-actions">
            <?= $this->Html->link('<i class="fas fa-list pr-2"></i>Ver Compras', ['action' => 'index'], ['escape' => false, 'class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="compra form content">
            <?= $this->Form->create($compra) ?>
            <fieldset>
                <h2><?= __('Añadir Compra') ?></h2>
                <?php
                    echo $this->Form->control('estatus_id', ['options' => $estatus]);
                    echo $this->Form->control('fabricante_id', ['options' => $fabricante]);
                    echo $this->Form->control('fecha');
                    echo $this->Form->control('merchandising._ids', ['options' => $merchandising, 'label' => 'Articulos']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Cantidades')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
