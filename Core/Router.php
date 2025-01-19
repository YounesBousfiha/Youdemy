<?php

namespace Younes\Youdemy\Core;

use Younes\Youdemy\Helpers\CSRF;
use Younes\Youdemy\Helpers\Session;
use Exception;
class Router
{
    private $routes = [];
    private $middleware;
    private $csrf;

    public function __construct()
    {
        $this->middleware = new Middleware();
        $this->csrf = new CSRF(new Session());
    }

    public function add($method, $uri, $handler, $middleware = null, $roles = []) {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $this->formatPath($uri),
            'handler' => $handler,
            'middleware' => $middleware,
            'rolesRequired' => $roles
        ];
    }

    public function dispatch($httpmethod, $path) {
        $uri = $this->formatPath($path);

        if ($httpmethod === 'POST') {
            try {
                $this->csrf->validate($_POST['csrf_token']);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        foreach ($this->routes as $route) {
            $routeParts = explode('/', $route['path']);
            $uriParts = explode('/', $uri);

            if ($route['method'] === strtoupper($httpmethod) && count($routeParts) === count($uriParts)) {
                $params = [];
                $isMatch = true;

                foreach ($routeParts as $index => $part) {

                    if (!str_contains($part, '{')) {
                        if ($part !== $uriParts[$index]) {
                            $isMatch = false;
                            break;
                        }
                    } else {
                        $params[] = $uriParts[$index];
                    }
                }

                if ($isMatch) {
                    // If middleware is set, call it
                    if ($route['middleware']) {
                        $middlewareMethpd = $route['middleware'];
                        $this->middleware->$middlewareMethpd();
                    }

                    // Check for roles if necessary
                    if (!empty($route['rolesRequired']) && !in_array($_SESSION['fk_role_id'], $route['rolesRequired'])) {
                        http_response_code(403);
                        die("You are not Authorized! or Your need to Login");
                    }

                    // Call the handler with parameters
                    $class = $route['handler'][0];
                    $method = $route['handler'][1];
                    $instance = new $class();
                    return call_user_func_array([$instance, $method], $params);
                }
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }

    private function formatPath($path) {
        return '/' . trim($path, '/');
    }
}