<?php

namespace Core;

class Aplicanion
{
    protected string $uri;
    public Request $request;

    public static Aplicanion $app;

    public function __construct()
    {
        self::$app = $this;
        $this->uri = $_SERVER['QUERY_STRING'];
        $this->request = new Request($this->uri);
    }

}
