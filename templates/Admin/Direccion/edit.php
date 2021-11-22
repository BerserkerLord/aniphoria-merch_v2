<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Direccion $direccion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $direccion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $direccion->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Direccion'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="direccion form content">
            <?= $this->Form->create($direccion) ?>
            <fieldset>
                <legend><?= __('Edit Direccion') ?></legend>
                <?php
                    echo $this->Form->control('cliente_id');
                    echo $this->Form->control('direccion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
