<?php
/**
 * Created by PhpStorm.
 * User: bon
 * Date: 2017-01-20
 * Time: 오후 11:06
 */

    require '../bootstrap.php';
    require '../ShoppingApp.php';

    $app = new ShoppingApp(true);
    $app->run();
?>