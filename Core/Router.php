<?php

namespace Younes\Youdemy\Core;

class Router
{
    private $routes = [];
    private $middleware;

    public function __construct()
    {
        $this->middleware = new Middleware();
    }

    public function add($method, $uri, $handler, $middleware = null) {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $this->formatPath($uri),
            'handler' => $handler,
            'middleware' => $middleware
        ];
    }

    public function dispatch($httpmethod, $path) {
        $uri = $this->formatPath($path);

        foreach ($this->routes as $route) {
            if($route['method'] === strtoupper($httpmethod) && $route['path'] === $uri) {
                if($route['middleware']) {
                    $middlewareMethpd = $route['middleware'];
                    $this->middleware->$middlewareMethpd();
                }
                $class = $route['handler'][0];
                $method = $route['handler'][1];
                $instance = new $class();
                return call_user_func([$instance, $method]);
            }
        }
        http_response_code(404);
        echo "404 Not Found";
    }

    private function formatPath($path) {
        return '/' . trim($path, '/');
    }
}