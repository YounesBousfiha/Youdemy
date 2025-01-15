<?php

namespace Younes\Youdemy\Controllers;

use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\DAO\AuthDAO;
use Younes\Youdemy\Helpers\Session;

class AuthController
{
    private $authDAO;
    private $db;
    private $session;

    public function __construct()
    {
        $this->db = DBConnection::GetConnection()->conn;
        $this->session = new Session();

        $this->authDAO = new AuthDAO($this->db, $this->session);
    }

    public function login($email, $password) {
        if($this->authDAO->login($email, $password)) {
            echo "Login";
        } else {
            echo "Fail to login";
        }
    }


}