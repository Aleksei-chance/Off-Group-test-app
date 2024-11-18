<?php

use \Core\Aplicanion;
use \Core\Request;
function app(): Aplicanion
{
    return Aplicanion::$app;
}

function request(): Request
{
    return app()->request;
}
