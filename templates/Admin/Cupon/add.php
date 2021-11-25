<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cupon $cupon
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cupon'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cupon form content">
            <?= $this->Form->create($cupon) ?>
            <fieldset>
                <legend><?= __('Add Cupon') ?></legend>
                <?php
                    echo $this->Form->control('fecha_expiracion');
                    echo $this->Form->control('porcentaje');
                    echo $this->Form->control('minimo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
