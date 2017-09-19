<?php
/**
 * Created by PhpStorm.
 * User: bon
 * Date: 2017-01-20
 * Time: 오전 10:50
 */
    require '/mvc/Loader.php';

    $loader = new Loader();
    $loader->regDirectory(dirname(__FILE__).'/mvc');
    $loader->regDirectory(dirname(__FILE__).'/models');

    $loader->register();
?>