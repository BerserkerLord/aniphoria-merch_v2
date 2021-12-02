<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categorium $categorium
 */
?>
<div class="row">
    <div class="column-responsive justify-content-center">
        <div class="side-nav-actions">
            <?= $this->Html->link('<i class="fas fa-list pr-2"></i>Ver Categorías', ['action' => 'index'], ['class' => 'side-nav-item', 'escape' => false]) ?>
        </div>
        <div class="categoria form content">
            <?= $this->Form->create($categorium) ?>
            <fieldset>
                <h2><?= __('Editar Categoría') ?></h2>
                <?php
                    echo $this->Form->control('categoria');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
