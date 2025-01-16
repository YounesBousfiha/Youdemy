<?php

use Younes\Youdemy\Core\Router;
use Younes\Youdemy\Controllers\AuthController;
use Younes\Youdemy\Controllers\TeacherController;
use Younes\Youdemy\Controllers\EtudiantController;
use Younes\Youdemy\Controllers\AdminController;
use Younes\Youdemy\Controllers\HomeController;


require_once __DIR__ . '/vendor/autoload.php';

$route = new Router();

// Public Routes
$route->add('GET', '/', [HomeController::class, 'index']);

// Authentification routes
$route->add('GET', '/login', [AuthController::class, 'index']);
$route->add('GET', '/signup', [AuthController::class, 'index']);
$route->add('POST', '/login', [AuthController::class, 'login']);
$route->add('POST', '/signup', [AuthController::class, 'signup']);
$route->add('GET', '/logout', [AuthController::class, 'logout']);

// dashboards routes
$route->add('GET', '/student/dashboard', [EtudiantController::class, 'index']);
$route->add('GET', '/teacher/dashboard', [TeacherController::class, 'index']);
$route->add('GET', '/admin/dashboard', [AdminController::class, 'index']);

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$route->dispatch($method, $uri);