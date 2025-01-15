<?php

namespace Younes\Youdemy\Entity;

use Younes\Youdemy\Helpers\Validator;
use Exception;

abstract class Person
{
    private $user_id;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $fk_role_id;

    public function __construct($user_id, $nom, $prenom, $email, $password, $fk_role_id)
    {
        try {
            $this->user_id = $user_id ? Validator::ValidateData($user_id) : null;
            $this->nom = Validator::ValidateData($nom);
            $this->prenom = Validator::ValidateData($prenom);
            $this->email = Validator::ValidateEmail($email);
            $this->password = Validator::ValidateData($password);
            $this->fk_role_id = Validator::ValidateData($fk_role_id);
        } catch (Exception $e) {
            echo "User Error: " . $e->getMessage();
        }

    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value)
    {
        $this->$property = $value;
    }
}