<?php
/** @var Core\Application $app */

use App\Controllers\OrderController;
use App\Controllers\ClientController;

$app->router->get('/orders', [OrderController::class, 'view']);

$app->router->get('order/(?P<slug>[a-z0-9_-]+)', [OrderController::class, 'item_view']);

$app->router->get('load_orders', [OrderController::class, 'load']);

$app->router->get('add_order_modal', [OrderController::class, 'add_order_modal']);
$app->router->post('add_order', [OrderController::class, 'add_order']);
$app->router->post('order_set_value_text', [OrderController::class, 'order_set_value_text']);

$app->router->get('client/(?P<slug>[a-z0-9_-]+)', [ClientController::class, 'item_view']);

