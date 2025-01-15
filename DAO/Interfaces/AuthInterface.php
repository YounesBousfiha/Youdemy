<?php

namespace Younes\Youdemy\DAO\Interfaces;

interface AuthInterface
{
    public function login($email, $password);
    public function signup($instance);
    public function logout();

    public function validateUser();

    public function isExist($email);
}