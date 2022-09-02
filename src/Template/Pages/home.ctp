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

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('googleMap.css') ?>
    <?= $this->Html->script('/js/googleMap') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
</head>

<body class="home">
    <nav class="navbar navbar-light bg-secondary px-4">
        <div class="container-fluid">
            <span class="navbar-brand">墨田区AED検索サイト</span>
        </div>
    </nav>
    <div class="container">
        <div class="row my-3">
            <div class="input-group">
                <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                    <option selected>施設名を選択してください</option>
                    <option value="1">両国シティコア</option>
                    <option value="2">スポーツクラブルネサンス両国</option>
                    <option value="3">財団法人東京都結核予防会</option>
                </select>
                <button class="btn btn-outline-secondary" type="button">確定</button>
            </div>
        </div>
        <div class="row">
            <div id="map"></div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" defer></script>
</body>

</html>
