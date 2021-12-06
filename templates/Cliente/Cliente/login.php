<?php setcookie('rol', 'cliente', time() + 20000000);
/**
  *
  * @var App\View\AppView $this
  */
?>
<div class="users form content col-md-4 container-fluid">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your email and password') ?></legend>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
    <br>
    <?= $this -> Html -> link(__('Regístrate'), ['_name' => 'registerClient', 'escape' => false])?>
</div>

