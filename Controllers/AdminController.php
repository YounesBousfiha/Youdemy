<?php

namespace Younes\Youdemy\Controllers;

class AdminController
{
    public function index() {
        require_once __DIR__ . '/../View/admin/dashboard.php';
    }
}