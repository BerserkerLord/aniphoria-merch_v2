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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $compra->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $compra->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Compra'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="compra form content">
            <?= $this->Form->create($compra) ?>
            <fieldset>
                <legend><?= __('Edit Compra') ?></legend>
                <?php
                    echo $this->Form->control('estatus_id', ['options' => $estatus]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
