<?php

namespace Younes\Youdemy\Entity;

class Admin extends Person
{
    public function __construct($user_id, $nom, $prenom, $email, $password, $fk_role_id)
    {
        parent::__construct($user_id, $nom, $prenom, $email, $password, $fk_role_id);
    }
}