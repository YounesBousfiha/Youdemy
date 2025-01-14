<?php

namespace Younes\Youdemy\Core;

class Router
{
    private $routes = [];

    public function add($method, $uri, $handler) {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $this->formatPath($uri),
            'handler' => $handler
        ];
    }

    public function dispatch($httpmethod, $path) {
        $uri = $this->formatPath($path);

        foreach ($this->routes as $route) {
            if($route['method'] === strtoupper($httpmethod) && $route['path'] === $uri) {
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