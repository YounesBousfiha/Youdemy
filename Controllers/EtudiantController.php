<?php

namespace Younes\Youdemy\Controllers;

class EtudiantController
{
    public function index() {
        require_once __DIR__ . "/../View/student/dashboard.php";
    }
}