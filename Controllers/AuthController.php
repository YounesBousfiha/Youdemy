<?php

namespace Younes\Youdemy\Controllers;

use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\DAO\AuthDAO;
use Younes\Youdemy\Entity\Student;
use Younes\Youdemy\Entity\Teacher;
use Younes\Youdemy\Helpers\Session;
use Younes\Youdemy\Helpers\Validator;
use Exception;

class AuthController
{
    private $authDAO;
    private $db;
    private $session;

    public function __construct()
    {
        $this->db = DBConnection::GetConnection()->conn;
        $this->session = new Session();

        $this->authDAO = new AuthDAO($this->db, $this->session);
    }

    public function index() {
        $uri = $_SERVER['REQUEST_URI'];
        if(str_contains($uri, 'login')) {
            include_once __DIR__ . '/../View/login.php';
        } else {
            include_once __DIR__ . '/../View/register.php';
        }
    }

    public function login() {

        try {
            $email = Validator::ValidateData($_POST['email']);
            $password = Validator::ValidateData($_POST['password']);
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        $user = $this->authDAO->login($email, $password);
        if($user) {
            $this->session->set('Authsucces', 'Vous etes bien connectez');
            if($user['fk_role_id'] === 1) {
                header('Location:  /admin/dashboard' );
            } elseif($user['fk_role_id'] === 2) {
                header('Location:  /teacher/dashboard' );
            } else {
                header('Location:  /student/dashboard' );
            }
        } else {
            $this->session->set('Error', 'Votre email or password est incorrect');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function signup() {
        try {
            $role = Validator::ValidateData($_POST['role_id']);
            $nom = Validator::ValidateData($_POST['nom']);
            $prenom = Validator::ValidateData($_POST['prenom']);
            $email = Validator::ValidateEmail($_POST['email']);
            $password = Validator::ValidateData($_POST['password']);
            $passwordConfirmation = Validator::ValidateData($_POST['password2']);
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            header('Location:' . $_SERVER['HTTP_REFERER']);
            return;
        }

        if($password !== $passwordConfirmation) {
            echo "Passwoord mismatch";
            $this->session->set('Error', 'Votre password ne sont pas comptabile');
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }

        if($role === '3') {
            $instance = new  Student(null, $nom, $prenom, $email, $password, $role);
        } else {
            $instance = new Teacher(null, $nom, $prenom, $email, $password, $role);
        }
        try {
            if($this->authDAO->signup($instance)) {
                $this->session->set('Success', 'Vous Bien Register si vous it un Eseignant Notre sera active votre compte');
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            header('Location:' . $_SERVER['HTTP_REFERER']);
            return;
        }
    }

    public function logout() {
        $this->authDAO->logout();
    }

}