<?php

use Younes\Youdemy\Controllers\CommentController;
use Younes\Youdemy\Controllers\CourseController;
use Younes\Youdemy\Controllers\EnrollmentController;
use Younes\Youdemy\Controllers\TagController;
use Younes\Youdemy\Core\Router;
use Younes\Youdemy\Controllers\AuthController;
use Younes\Youdemy\Controllers\TeacherController;
use Younes\Youdemy\Controllers\EtudiantController;
use Younes\Youdemy\Controllers\AdminController;
use Younes\Youdemy\Controllers\HomeController;
use Younes\Youdemy\Controllers\CategorieController;

require_once __DIR__ . '/vendor/autoload.php';

$route = new Router();

// Public Routes
$route->add('GET', '/', [HomeController::class, 'index']);
$route->add('GET', '/catalogue', [HomeController::class, 'cataloguePage']);
$route->add('GET', '/categorie/{id}', [HomeController::class, 'coursesByCategory']);
$route->add('GET', '/course/{id}', [HomeController::class, 'courseDetails'], 'auth', [1, 2, 3]);
$route->add('GET', '/course/content/{id}', [HomeController::class, 'courseContent'], 'auth', [1, 3]);

// Authentification routes
$route->add('GET', '/login', [AuthController::class, 'index']);
$route->add('GET', '/signup', [AuthController::class, 'index']);
$route->add('POST', '/login', [AuthController::class, 'login']);
$route->add('POST', '/signup', [AuthController::class, 'signup']);
$route->add('GET', '/logout', [AuthController::class, 'logout']);

// dashboards routes
$route->add('GET', '/student/dashboard', [EtudiantController::class, 'index'], 'auth',[1, 3]);
$route->add('GET', '/teacher/dashboard', [TeacherController::class, 'index'], 'auth', [1, 2]);
$route->add('GET', '/admin/dashboard', [AdminController::class, 'index'], 'auth', [1]);

/* ADMIN ROUTES */
// category CRUD
$route->add('GET', '/admin/category', [CategorieController::class, 'categoryPage'], 'auth', [1]);
$route->add('POST', '/admin/category/create', [AdminController::class, 'createCategory'], 'auth', [1]);
$route->add('POST', '/admin/category/delete', [AdminController::class, 'deleteCategory'], 'auth', [1]);
$route->add('POST', '/admin/category/update', [AdminController::class, 'updateCategory'], 'auth', [1]);
// tag CRUD
$route->add('GET', '/admin/tags', [TagController::class, 'tagPage'], 'auth', [1]);
$route->add('POST', '/admin/tag/create',[TagController::class, 'createTag'], 'auth', [1]);
$route->add('POST', '/admin/tag/update', [TagController::class, 'updateTag'], 'auth', [1]);
$route->add('POST', 'admin/tag/delete', [TagController::class, 'deleteTag'], 'auth', [1]);
// Validate Teacher Account routes
$route->add('GET', '/admin/teachers', [AdminController::class, 'manageTeacher'], 'auth', [1]);
$route->add('POST', '/admin/teacher/validate', [AdminController::class, 'validateTeacher'], 'auth', [1]);
$route->add('POST', '/admin/teacher/reject', [AdminController::class, 'rejectTeacher'], 'auth', [1]);
// User management routes
$route->add('GET', '/admin/users', [AdminController::class, 'userPage'], 'auth', [1]);
$route->add('POST', '/admin/user/delete', [AdminController::class, 'deleteUser'], 'auth', [1]);
$route->add('POST', '/admin/user/suspend', [AdminController::class, 'suspendUser'], 'auth', [1]);
$route->add('POST', '/admin/user/activate', [AdminController::class, 'ActiveUser'], 'auth', [1]);


// comments management routes
$route->add('GET', '/admin/comments', [CommentController::class, 'commentPage'], 'auth', [1]);
$route->add('POST', '/admin/comment/delete', [CommentController::class, 'deleteComment'], 'auth', [1]);

// Course management routes
$route->add('GET', '/admin/courses', [CourseController::class, 'getAllCourse'], 'auth', [1]);
$route->add('POST', '/admin/course/delete', [CourseController::class, 'deleteCourse'], 'auth', [1]);
$route->add('POST', '/admin/course/update', [CourseController::class, 'updateCourseByAdmin'], 'auth', [1]);
$route->add('POST', '/admin/course/approuve', [CourseController::class, 'approuve'], 'auth', [1]);
$route->add('POST', '/admin/course/reject', [CourseController::class, 'reject'], 'auth', [1]);

/* TEACHER ROUTES */
// course management routes
$route->add('GET', '/teacher/courses', [CourseController::class, 'coursePage'], 'auth', [1, 2]);
$route->add('GET', '/teacher/courses/enrollments/{id}', [EnrollmentController::class, 'TeacherCourseManager'], 'auth', [1, 2]);
$route->add('GET', '/teacher/courses/creation', [CourseController::class, 'createCoursePage'], 'auth', [1, 2]);
$route->add('POST', '/teacher/course/create', [CourseController::class, 'createCourse'], 'auth', [1, 2]);
$route->add('POST', '/teacher/course/update', [CourseController::class, 'updateCourse'], 'auth', [1, 2]);
$route->add('POST', '/teacher/course/delete', [CourseController::class, 'deleteCourse'], 'auth', [1, 2]);

/* STUDENT ROUTES */

// Enrollement routes
$route->add('POST', '/student/enroll', [EtudiantController::class, 'enrollCourse'], 'auth', [1, 3]);
$route->add('POST', '/student/deroll', [EtudiantController::class, 'unenrollCourse'], 'auth', [1, 3]);

$route->add('GET', '/student/mesCours', [EtudiantController::class, 'myCoursesPage'], 'auth', [1, 3]);
$route->add('GET', '/student/courses', [EtudiantController::class, 'coursesPage'], 'auth', [1, 3]);

// Comment routes
$route->add('POST', '/student/comment/create', [CommentController::class, 'createComment'], 'auth', [1, 3]);
$route->add('POST', '/student/comment/delete', [EtudiantController::class, 'deleteComment'], 'auth', [1, 3]); // TODO : create deleteComment method in EtudiantController
$route->add('POST', '/student/comment/update', [EtudiantController::class, 'updateComment'], 'auth', [1, 3]); // TODO : create updateComment method in EtudiantController

// stats routes
$route->add('GET', '/student/statistics', [EtudiantController::class, 'statisticsPageStudent'], 'auth', [1, 3]); // TODO : create statisticsPage method in EtudiantController
$route->add('GET', '/teacher/statistics', [TeacherController::class, 'statisticsPageTeacher'], 'auth', [1, 2]); // TODO : create statisticsPage method in EtudiantController
$route->add('GET', '/admin/statistics', [AdminController::class, 'statisticsPageAdmin'], 'auth', [1]); // TODO : create statisticsPage method in EtudiantController

$method = $_SERVER['REQUEST_METHOD'];
$uri = strtok($_SERVER['REQUEST_URI'], '?');

$route->dispatch($method, $uri);