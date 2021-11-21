<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchandising $merchandising
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $merchandising->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $merchandising->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Merchandising'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="merchandising form content">
            <?= $this->Form->create($merchandising, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Merchandising') ?></legend>
                <?php
                    echo $this->Form->control('categoria_id', ['options' => $categoria]);
                    echo $this->Form->control('articulo');
                    echo $this->Form->control('detalles');
                    echo $this->Form->control('costo');
                    echo $this->Form->control('precio');
                    echo $this->Form->control('imagen[]', ['type' => 'file', 'multiple']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
