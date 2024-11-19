<?php
/** @var Core\Application $app */

use App\Controllers\OrderController;

$app->router->get('/orders', [OrderController::class, 'view']);

$app->router->get('order/(?P<slug>[a-z0-9_-]+)', [OrderController::class, 'item_view']);

$app->router->post('load_orders', [OrderController::class, 'load']);
