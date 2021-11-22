<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Imagen $imagen
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Imagen'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive justify-content-center">
        <div class="imagen form content">
            <?= $this->Form->create($imagen) ?>
            <fieldset>
                <legend><?= __('Add Imagen') ?></legend>
                <?php
                    echo $this->Form->control('merchandising_id', ['options' => $merchandising]);
                    echo $this->Form->control('imagen');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
