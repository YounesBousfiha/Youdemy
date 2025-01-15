<?php

use Younes\Youdemy\Core\Router;
use Younes\Youdemy\Controllers\AuthController;

require_once __DIR__ . '/vendor/autoload.php';


$route = new Router();


$route->add('GET', '/login', [AuthController::class, 'login']); // TODO: change it to index login to show login page


$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

echo "Hello IndexxXXx";
echo '<br>';
$route->dispatch($method, $uri);