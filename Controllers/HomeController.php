<?php

namespace Younes\Youdemy\Controllers;

use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\Helpers\Session;
use Younes\Youdemy\DAO\CategorieDAO;

use Exception;
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

    public function cataloguePage() {
        try {
            $categoriesDAO = new CategorieDAO($this->db);
            $categoriesDATA = $categoriesDAO->index();
            include_once __DIR__ . '/../View/catalogue.php';
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            return null;
        }

    }
}