<?php

namespace Younes\Youdemy\Controllers;

class TeacherController
{
    public function index() {
        require_once __DIR__ . '/../View/teacher/dashboard.php';
    }

    public function statisticsPageTeacher() {
        require_once __DIR__ . '/../View/teacher/statistics.php';
    }

}