<?php

namespace Younes\Youdemy\Controllers;

use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\DAO\AdminDAO;
use Younes\Youdemy\Entity\Categorie;
use Younes\Youdemy\Helpers\Session;
use Younes\Youdemy\Helpers\Validator;
use Exception;
class AdminController
{
    private $db;
    private $session;
    public function __construct()
    {
        $this->db = DBConnection::getConnection()->conn;
        $this->session = new Session();
    }

    public function index() {
        require_once __DIR__ . '/../View/admin/dashboard.php';
    }

    public function manageTeacher() {
        $admindao = new AdminDAO($this->db);
        $invalidTeacher = $admindao->manageTeacher();

        include_once __DIR__ . '/../View/admin/validate-teachers.php';
    }

    public function userPage() {
        $admindao = new AdminDAO($this->db);
        $allusers = $admindao->displayUsers();

        include_once  __DIR__ . '/../View/admin/user-management.php';
    }

    public function deleteUser() {
        try {
            $user_id = Validator::ValidateData($_POST['user_id']);
        } catch (Exception $e) {
            $this->session->set('Error', 'Missing user_id');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        $admindao = new AdminDAO($this->db);
        if($admindao->deleteAccount($user_id)) {
            $this->session->set('Success', 'Account Deleted');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set('Error', 'Failed to delete account');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }


    public function createCategory() {
        $categorie_nom = $_POST['nom'];
        $categorie_img = $_FILES['image'];

        $categorieController = new CategorieController();
        $categorieController->createCategorie($categorie_nom, $categorie_img);
    }

    public function deleteCategory() {
        try {
            $category_id = Validator::ValidateData($_POST['category_id']);

            $categoryController = new CategorieController();
            $categoryController->deleteCategory($category_id);
        } catch (Exception $e) {
            echo 'Error while deleting Category:' . $e->getMessage();
            return;
        }
    }

    public function updateCategory() {
        $categorie_id = $_POST['category_id'];
        $categorie_nom = $_POST['nom'];
        $categorie_img = $_FILES['image'];

        $categorieController = new CategorieController();
        $categorieController->updateCategory($categorie_id, $categorie_img, $categorie_nom);
    }

    public function validateTeacher() {
        try {
            $teacher_id = Validator::ValidateData($_POST['teacher_id']);
        } catch (Exception $e) {
            $this->session->set('Error', 'teacher_id is not set correctly');
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }

        $admindao = new AdminDAO($this->db);

        if($admindao->activeTeacherAccount($teacher_id)) {
            $this->session->set('Success', 'teacher account is Activated !');
            header('Location:' . $_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set('Error', 'failed to activate teacher account');
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }


    }
}