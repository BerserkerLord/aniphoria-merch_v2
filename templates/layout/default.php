<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>


    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

    <?= $this->Html->css('milligram.min.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('sidebar.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('normalize.css')?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav navbar-expand-lg">
        <div class="top-nav-title">
            <a class="btn" id="sidebarCollapse"><span id="ani">Ani</span><span id="phoria">Phoria</span></a>
        </div>
    </nav>
    <nav id="sidebar">
        <div id="dismiss">
            <i class="fas fa-arrow-left pr-2"></i>
        </div>
        <div class="sidebar-header">
            <h3>Menu</h3>
        </div>
        <ul class="list-unstyled components">
            <li><?= $this -> Html -> link('<i class="fas fa-user-tag pr-2"></i>Clientes', ['_name' => 'viewClients'], ['escape' => false]) ?></li>
            <li><?= $this -> Html -> link('<i class="fas fa-book pr-2"></i>Categorías', ['_name' => 'viewCategories'], ['escape' => false]) ?></li>
            <li><?= $this -> Html -> link('<i class="fas fa-shopping-basket pr-2"></i>Mercancía', ['_name' => 'viewMerchandising'], ['escape' => false]) ?></li>
            <li><?= $this -> Html -> link('<i class="fas fa-file-invoice-dollar pr-2"></i>Ordenes de Compra', ['_name' => 'viewCompras'], ['escape' => false]) ?></li>
            <li><?= $this -> Html -> link('<i class="fas fa-truck-moving pr-2"></i>Fabricantes', ['_name' => 'viewManufacturers'], ['escape' => false]) ?></li>
            <li><?= $this -> Html -> link('<i class="fas fa-user-shield pr-2"></i>Administradores', ['_name' => 'viewAdmins'], ['escape' => false]) ?></li>
            <li><?= $this -> Html -> link('<i class="fas fa-map-signs pr-2"></i>Direcciones', ['_name' => 'viewAddresses'], ['escape' => false]) ?></li>
            <li><a href="#"><i class="fas fa-tag pr-2"></i>Discount coupons</a></li>
            <li><a href="#"><i class="fas fa-credit-card pr-2"></i>Paying Methods</a></li>
            <li><?= $this -> Html -> link('<i class="fas fa-running pr-2"></i>Salir', ['_name' => 'logoutClient'], ['escape' => false]) ?></li>
        </ul>
    </nav>
    <main class="main">
        <div class="container-fluid justify-content-center">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
    <script src="https://kit.fontawesome.com/b890b07869.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript" language="javascript"></script>        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>
</html>
