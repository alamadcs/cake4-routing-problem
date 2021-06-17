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
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>
    <style>
    body.admin nav{
        background:#000;
    }
    body.admin nav a{
        Color:#FFF;
    }
    body.admin nav a.lang-links{
        background:yellow;
        color:#333;
    }
    
    </style>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class='admin'>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>">Admin Section</a>
        </div>
        <div class="top-nav-links"> 
            <?php echo $this->Html->link(__('Goto Public Site'),['controller'=>'Articles','prefix'=>false],['class'=>'lang-links']); ?>
            <?php echo $this->Html->link(__('Articles'),['controller'=>'Articles']); ?>
            <?php echo $this->Html->link(__('Articles Tags'),['controller'=>'ArticlesTags']); ?>
            <?php echo $this->Html->link(__('Tags'),['controller'=>'Tags']); ?>
            <?php echo $this->Html->link(__('Users'),['controller'=>'Users']); ?>
            <?php echo $this->Html->link(__('Logout'),['controller'=>'Users','action'=>'logout','prefix'=>false]); ?>
            <?php echo $this->Html->link(__('EN'),['controller'=>'App','action'=>'changeLanguage','en','prefix'=>false],['class'=>'lang-links']); ?>
            <?php echo $this->Html->link(__('AR'),['controller'=>'App','action'=>'changeLanguage','ar','prefix'=>false],['class'=>'lang-links']); ?> 
        </div>
    </nav>
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