<?php

namespace Younes\Youdemy\Entity;

use Younes\Youdemy\Helpers\Validator;

use Exception;

class Tag
{
    private $tag_id;
    private $tag_nom;

    public function __construct($tag_id = null, $tag_nom) {
        try {
            $this->tag_id = $tag_id ? Validator::ValidateData($tag_id) : null;
            $this->tag_nom = Validator::ValidateData($tag_nom);
        } catch (Exception $e) {
            echo "Error Tag : " . $e->getMessage();
        }
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public  function __set($property, $value) {
        $this->$property = $value;
    }

}