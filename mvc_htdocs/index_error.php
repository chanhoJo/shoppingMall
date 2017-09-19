<?php
/**
 * Created by PhpStorm.
 * User: bon
 * Date: 2017-01-21
 * Time: 오후 3:24
 */
    require '../bootstrap.php';
    require '../ShoppingApp.php';

    $app = new ShoppingApp(true);
    $app->run();