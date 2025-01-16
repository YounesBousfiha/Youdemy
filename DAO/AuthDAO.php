<?php

namespace Younes\Youdemy\DAO;

use Younes\Youdemy\DAO\Interfaces\AuthInterface;

use Exception;

class AuthDAO implements AuthInterface
{
    // TODO: Login  should be manage using $_SESSION
    private $db;
    private $session;
    private $table = "Persons";

    public function __construct($db, $session)
    {
        $this->db = $db;
        $this->session = $session;

    }
    public function isExist($email)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = :email";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email);
            if($stmt->execute()) {
                return $stmt->fetch();
            }
            return null;
        } catch (Exception $e) {
            echo 'Error check existing email: ' . $e->getMessage();
            return null;
        }
    }
    public function login($email, $password) {
        $user = $this->isExist($email);
        if($user && password_verify($password, $user['password'])) {
            foreach ($user as $key => $value){
                $this->session->set($key, $value);
            }
            $this->session->set('email', $user['email']);
            return $user;
        } else {
            return null;
        }
    }

    public function signup($instance)
    {
        $sql = "INSERT INTO {$this->table} (nom, prenom, email, password, fk_role_id) VALUES(:nom, :prenom, :email, :password, :fk_role_id)";
        if($this->isExist($instance->email)) {
            throw new Exception('Email is Already Exist');
        }
        try {
            $stmt = $this->db->prepare($sql);
            $hashedPassword = password_hash($instance->password, PASSWORD_DEFAULT);
            $stmt->bindParam(':nom', $instance->nom);
            $stmt->bindParam(':prenom', $instance->prenom);
            $stmt->bindParam(':email', $instance->email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':fk_role_id', $instance->fk_role_id);
            if($stmt->execute()) {
                return $this->db->lastInsertId();
            }
            return null;
        } catch (Exception $e) {
            echo "Error in signup : " . $e->getMessage();
            return null;
        }
    }

    public function logout()
    {
        $this->session->remove('email');
        $this->session->remove('user_id');
        $this->session->remove('fk_role_id');
        $this->session->destroy();
    }

    public function validateUser()
    {
        $email = $this->session->get('email');
        if($email) {
            return $this->isExist($email);
        }
        return null;
    }
}