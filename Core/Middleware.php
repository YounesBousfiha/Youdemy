<?php

namespace Younes\Youdemy\Core;

use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\DAO\EnrollmentDAO;

class Middleware
{
    public function auth() {
        session_start();
        if(!isset($_SESSION['email'])) {
            header('Location: /login');
        }
    }
}