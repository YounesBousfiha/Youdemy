<?php

namespace Younes\Youdemy\Controllers;

class AdminController
{
    public function index() {
        require_once __DIR__ . '/../View/admin/dashboard.php';
    }

    public function createcategory() {
        $categorie_nom = $_POST['nom'];
        $categorie_img = $_FILES['image'];

        $categorieController = new CategorieController();
        $categorieController->createCategorie($categorie_nom, $categorie_img);
    }
}