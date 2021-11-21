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

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        * {
                        margin: 0;
                        padding: 0;
                        font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                        font-size: 10px;
                    }
    
                    body {
                        width: 100%;
                        height: 100%;
                        line-height: 2;
                    }
                    
                    body {
                        background-color: #f6f6f6;
                    }
                    
                    .content {
                        max-width: 1000px;
                        margin: 0 auto;
                        display: block;
                        padding: 20px;
                    }
                    
                    .main {
                        background: #fff;
                        border: 1px solid #e9e9e9;
                        border-radius: 3px;
                    }
                    
                    .content-wrap {
                        padding: 20px;
                    }
                    
                    .content-block {
                        padding: 0 0 20px;
                    }
                    
                    h2{
                        font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
                        color: #000;
                        margin: 40px 0 0;
                        line-height: 1.2;
                        font-weight: 400;
                        font-size: 24px;
                    } 
                    
                    .alignright {
                        text-align: right;
                    }
                    
                    .alignleft {
                        text-align: left;
                    }
                    
                    .invoice {
                        margin: 40px auto;
                        text-align: left;
                        width: 80%;
                    }
                   
                    .invoice .invoice-items {
                        width: 100%;
                    }
                    .invoice .invoice-items td {
                        border-top: #eee 1px solid;
                    }
                    .invoice .invoice-items .total td {
                        border-top: 2px solid #333;
                        border-bottom: 2px solid #333;
                        font-weight: 700;
                    }
                    
                    .line0{
                        line-height: 2;
                    }
    </style>
</head>
<body>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
