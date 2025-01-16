<?php

namespace Younes\Youdemy\Controllers;

use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\Helpers\Session;

class HomeController
{

    private $db;
    private $session;

    public function __construct()
    {
        $this->db = DBConnection::getConnection()->conn;
        $this->session = new Session();
    }

    public function index() {
        include_once __DIR__ . '/../View/index.php';
    }
}