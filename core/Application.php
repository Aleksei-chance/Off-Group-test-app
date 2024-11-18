<?php

namespace Core;

class Application
{
    protected string $uri;
    public Request $request;
    public Response $response;
    public Router $router;
    public static Application $app;

    public function __construct()
    {
        self::$app = $this;
        $this->uri = $_SERVER['QUERY_STRING'];
        $this->request = new Request($this->uri);
        $this->response = new  Response();
        $this->router = new  Router($this->request, $this->response);
    }

    public function run()
    {
        echo $this->router->dispatch();
    }
}