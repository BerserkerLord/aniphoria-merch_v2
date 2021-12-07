<?php
/**
 * @var \App\View\AppView $this
 */
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error500.php');

    $this->start('file');
?>

<div class="error">
    <div>
        <div>
            <div class="error-text" style="text-align: center; align-content: center">
                <?= $this -> Html -> image('general/404.jpg', ['alt' => 'ded']) ?>
                <h1 style="color: #ff1166">Oops! Not Found.</h1>
                <p>The page you requested for is not found.</p>
            </div>
        </div>
    </div>
</div>
