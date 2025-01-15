<?php

namespace Younes\Youdemy\Entity;

use Younes\Youdemy\Helpers\Validator;

class Categorie
{
    private $categorie_id;
    private $categorie_nom;
    public function __construct($categorie_id, $categorie_nom) {
        try {
            $this->categorie_id = $categorie_id ? Validator::ValidateData($categorie_id) : null;
            $this->categorie_nom = Validator::ValidateData($categorie_nom);
        } catch (\Exception $e) {
            echo "Categorie Error: " . $e->getMessage();
        }
    }

    public function __get($property) {
        return $this->$property;
    }
    public function __set($property, $value) {
        $this->$property = $value;
    }

}