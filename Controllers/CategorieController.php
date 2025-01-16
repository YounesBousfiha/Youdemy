<?php

namespace Younes\Youdemy\Controllers;

use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\DAO\CategorieDAO;
use Younes\Youdemy\Entity\Categorie;
use Younes\Youdemy\Helpers\Session;
use Exception;
class CategorieController
{
    private $db;

    private $session;
    public function __construct()
    {
        $this->db = DBConnection::getConnection()->conn;
        $this->session = new Session();
    }

    public function categoryPage() {
        $categorieDAO = new CategorieDAO($this->db);
        $data = $categorieDAO->index();
        include_once __DIR__ . '/../View/admin/category-management.php';
    }

    public function createCategorie($nom, $image) {
        $categorie = new Categorie(null, $image, $nom);
        $categorieDAO = new CategorieDAO($this->db);
        try {
            $categorieDAO->create($categorie);
            $this->session->set('Success', 'Your Just add new Categorie');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function deleteCategory($id) {
        $categorieDAO = new CategorieDAO($this->db);
        try {
            $categorieDAO->delete($id);
            $this->session->set('Success', 'category is deleted');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            //header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}