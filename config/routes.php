<?php
/** @var Core\Application $app */

use App\Controllers\OrderController;

$app->router->get('/orders', [OrderController::class, 'view']);

$app->router->get('order/(?P<slug>[a-z0-9_-]+)', []);
