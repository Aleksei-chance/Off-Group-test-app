<?php

//$startTime = microtime(true);

if (PHP_MAJOR_VERSION < 8)
{
    die('Require PHP version is 8.0+');
}

require_once __DIR__ . '/../config/config.php';
require_once ROOT . '/vendor/autoload.php';
require_once HELPERS . '/helpers.php';

$app = new Core\Application();
require_once CONFIG . '/routes.php';
$app->run();


//var_dump('Time: '.microtime(true) - $startTime);
