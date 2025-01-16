<?php

namespace Younes\Youdemy\Entity;

use Younes\Youdemy\Helpers\Validator;
use Exception;

class Categorie
{
    private $categorie_id;
    private $categorie_nom;
    private $categorie_img;
    public function __construct($categorie_id = null, $categorie_img ,$categorie_nom) {
        try {
            $this->categorie_id = $categorie_id ? Validator::ValidateData($categorie_id) : null;
            $this->categorie_img = Validator::ValidateImage($categorie_img);
            $this->categorie_nom = Validator::ValidateData($categorie_nom);
        } catch (Exception $e) {
            echo "Categorie Error: " . $e->getMessage() . "<br>";
        }
    }

    public function __get($property) {
        return $this->$property;
    }
    public function __set($property, $value) {
        $this->$property = $value;
    }

}