<?php

use Younes\Youdemy\Core\Router;
use Younes\Youdemy\Controllers\AuthController;
use Younes\Youdemy\Controllers\TeacherController;
use Younes\Youdemy\Controllers\EtudiantController;
use Younes\Youdemy\Controllers\AdminController;
use Younes\Youdemy\Controllers\HomeController;
use Younes\Youdemy\Controllers\CategorieController;
use Younes\Youdemy\Core\Middleware;


require_once __DIR__ . '/vendor/autoload.php';

$route = new Router();

// Public Routes
$route->add('GET', '/', [HomeController::class, 'index']);
$route->add('GET', '/catalogue', [HomeController::class, 'cataloguePage']);

// Authentification routes
$route->add('GET', '/login', [AuthController::class, 'index']);
$route->add('GET', '/signup', [AuthController::class, 'index']);
$route->add('POST', '/login', [AuthController::class, 'login']);
$route->add('POST', '/signup', [AuthController::class, 'signup']);
$route->add('GET', '/logout', [AuthController::class, 'logout']);

// dashboards routes
$route->add('GET', '/student/dashboard', [EtudiantController::class, 'index'], 'auth');
$route->add('GET', '/teacher/dashboard', [TeacherController::class, 'index'], 'auth');
$route->add('GET', '/admin/dashboard', [AdminController::class, 'index'], 'auth');

// admin routes
$route->add('GET', '/admin/category', [CategorieController::class, 'categoryPage'], 'auth');
$route->add('POST', '/admin/category', [AdminController::class, 'createCategory'], 'auth');
$route->add('POST', '/admin/category/delete', [AdminController::class, 'deleteCategory'], 'auth');


$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$route->dispatch($method, $uri);