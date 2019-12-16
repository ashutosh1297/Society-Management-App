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
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap') ?>
    <?= $this->Html->css('customcss') ?>
    <?= $this->Html->script('custom') ?>
    <?= $this->Html->script('bootstrap') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/Society-Management-App/Dashboard">Society Management App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item" id="/Dashboard">
                <a class="nav-link" href="/Society-Management-App/Dashboard">Dashboard</a>
            </li>
            <li class="nav-item" id="/Societies">
                <a class="nav-link" href="/Society-Management-App/Societies">Societies</a>
            </li>
            <li class="nav-item" id="/Members">
                <a class="nav-link" href="/Society-Management-App/Members">Members</a>
            </li>
            <li class="nav-item" id="/Units">
                <a class="nav-link" href="/Society-Management-App/Units">Units</a>
            </li>
            <li class="nav-item" id="/Complaints">
                <a class="nav-link" href="/Society-Management-App/Complaints">Complaints</a>
            </li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <script>
    (function (){
        switch(window.location.pathname){
            case ("/Society-Management-App/Dashboard"):
                window.document.getElementById('/Dashboard').classList.add('active');
            break;
            case ("/Society-Management-App/Societies"):
                document.getElementById('/Societies').classList.add('active');
            break;
            case ("/Society-Management-App/Members"):
                document.getElementById('/Members').classList.add('active');
            break;
            case ("/Society-Management-App/Units"):
                document.getElementById('/Units').classList.add('active');
            break;
            case ("/Society-Management-App/Complaints"):
                document.getElementById('/Complaints').classList.add('active');
            break;
            default: 
            break;
        }
    }) ();
    </script>
</body>
</html>
