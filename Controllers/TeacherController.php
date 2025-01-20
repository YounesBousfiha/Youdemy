<?php

namespace Younes\Youdemy\Controllers;

class TeacherController
{
    public function index() {
        require_once __DIR__ . '/../View/teacher/dashboard.php';
    }

}