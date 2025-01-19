<?php

namespace Younes\Youdemy\Controllers;

use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\DAO\EnrollmentDAO;
use Younes\Youdemy\Entity\Enrollment;
use Younes\Youdemy\Helpers\Session;
use Younes\Youdemy\Helpers\Validator;

class EtudiantController
{
    private $db;
    private $session;
    private $enrollDAO;

    public function __construct()
    {
        $this->db = DBConnection::getConnection()->conn;
        $this->session = new Session();
        $this->enrollDAO = new EnrollmentDAO($this->db);
    }

    public function index() {
        require_once __DIR__ . "/../View/student/dashboard.php";
    }

    public function myCoursesPage() {
        $fk_user_id = $_SESSION['user_id'];
        $enrollments = $this->enrollDAO->getEnrollmentsByUser($fk_user_id);
        require_once __DIR__ . "/../View/student/my-courses.php";
    }

    public function enrollCourse() {
        try {
            $fk_user_id = $_SESSION['user_id'];
            $fk_course_id = Validator::ValidateData($_POST['course_id']);

            $enrollInstance = new Enrollment('null', 'active', $fk_user_id, $fk_course_id);

            $this->enrollDAO->enrollInCourse($enrollInstance);
            $this->session->set('Success', 'Course enrolled successfully');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
            $this->session->set('Error', 'Missing course_id');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function unenrollCourse() {
        try {
            $enrollement_id = Validator::ValidateData($_POST['enrollment_id']);

            $this->enrollDAO->cancelEnrollment($enrollement_id);

            $this->session->set('Success', 'Course unenrolled successfully');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
            $this->session->set('Error', 'Missing course_id');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}