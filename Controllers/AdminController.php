<?php

namespace Younes\Youdemy\Controllers;

use Younes\Youdemy\Helpers\Validator;
use Exception;
class AdminController
{
    public function index() {
        require_once __DIR__ . '/../View/admin/dashboard.php';
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
}