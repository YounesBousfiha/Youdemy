<?php

namespace Younes\Youdemy\Entity;

class Teacher extends Person
{
    private $status;
    public function __construct($user_id, $nom, $prenom, $email, $password, $fk_role_id, $status = null)
    {
        $this->status = 'inactive';
        parent::__construct($user_id = null, $nom, $prenom, $email, $password, $fk_role_id, $this->status);
    }

}