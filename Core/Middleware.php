<?php

namespace Younes\Youdemy\Core;

class Middleware
{
    public function auth() {
        session_start();
        if(!isset($_SESSION['email'])) {
            header('Location: /login');
        }
    }
}