<?php

use Core\Application;
use Core\Request;
use Core\View;
use Core\Response;
use JetBrains\PhpStorm\NoReturn;

function app(): Application
{
    return Application::$app;
}

function request(): Request
{
    return app()->request;
}

function response(): Response
{
    return app()->response;
}

function view($view = '',$data = [],$layout = ''): string|View
{
    if($view)
    {
        return app()->view->render($view, $data, $layout);
    }
    return app()->view;
}

function abort($error = '', $code = 404)
{
    response()->setResponseCode($code);
    echo view("errors/{$code}", ['error' => $error], false);
    die;
}

function base_url($path = ''):string
{
    return PATH . $path;
}
