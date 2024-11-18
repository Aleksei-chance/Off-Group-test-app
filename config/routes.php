<?php
/** @var Core\Application $app */

use App\Controllers\OrderController;

$app->router->get('/orders', [OrderController::class, 'view']);

var_dump($app->router->getRoutes());
