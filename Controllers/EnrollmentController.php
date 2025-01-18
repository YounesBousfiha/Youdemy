<?php

namespace Younes\Youdemy\Controllers;

use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\DAO\EnrollmentDAO;
use Younes\Youdemy\Helpers\Session;

class EnrollmentController
{
    private $session;
    private $db;

    private $enrollmentdao;


    public function  __construct() {
        $this->db = DBConnection::getConnection()->conn;
        $this->session = new Session();
        $this->enrollmentdao  = new EnrollmentDAO($this->db);
    }

    public function TeacherCourseManager($id) {
        $course_id = htmlspecialchars($id);

        $enrollments = $this->enrollmentdao->studentEnrolledByTeacher($course_id);

        require_once __DIR__ . '/../View/teacher/course-enrollment.php';
    }




}