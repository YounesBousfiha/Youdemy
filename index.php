<?php

use Younes\Youdemy\Core\Router;
use Younes\Youdemy\DAO\AuthDAO;

require_once __DIR__ . '/vendor/autoload.php';


$route = new Router();


$route->add('GET', '/login', [AuthDAO::class, 'login']);


$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

echo "Hello IndexxXXx";
echo '<br>';
$route->dispatch($method, $uri);