<?php

namespace Younes\Youdemy\Entity;

class Student extends Person
{

    public function __construct($user_id, $nom, $prenom, $email, $password, $fk_role_id, $status)
    {
        parent::__construct($user_id = null, $nom, $prenom, $email, $password, $fk_role_id, $status);
    }
}