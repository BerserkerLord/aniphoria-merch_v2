<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra $compra
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Compra'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="compra form content">
            <?= $this->Form->create($compra) ?>
            <fieldset>
                <legend><?= __('Add Compra') ?></legend>
                <?php
                    echo $this->Form->control('estatus_id', ['options' => $estatus]);
                    echo $this->Form->control('fabricante_id', ['options' => $fabricante, 'empty' => true]);
                    echo $this->Form->control('fecha');
                    echo $this->Form->control('merchandising._ids', ['options' => $merchandising]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
