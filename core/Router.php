<?php

namespace Core;

class Router
{
    protected array $routes = [];
    protected array $route_params = [];

    public function __construct(
        protected Request $request,
        protected Response $response
    )
    {
    }

    public function add($path, $callback, $method): self
    {
        $path = trim($path, '/');
        if(is_array($method))
        {
            $method = array_map('strtoupper', $method);
        }
        else
        {
            $method = [strtoupper($method)];
        }
        $this->routes[] = [
            'path' => "/$path",
            'callback' => $callback,
            'middleware' => null,
            'method' => $method,
        ];
        return $this;
    }

    public function get($path, $callback): self
    {
        return $this->add($path, $callback, 'get');
    }

    public function post($path, $callback): self
    {
        return $this->add($path, $callback, 'post');
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function dispatch(): mixed
    {
        return 'test';
    }
}
