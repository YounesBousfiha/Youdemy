<?php

namespace Younes\Youdemy\Controllers;

use Exception;
use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\Helpers\Session;
use Younes\Youdemy\DAO\StatsDAO;

class StatsController
{
    private $db;
    private $session;
    private $statsdao;

    public function __construct()
    {
        $this->db = DBConnection::getConnection()->conn;
        $this->session = new Session();
        $this->statsdao = new StatsDAO($this->db);
    }

    public function TeacherStats() {
        $teacher_id = $_SESSION['user_id'];
        try {
            $totalcourses = $this->statsdao->CountCourseByTeacher($teacher_id);
            $studentsPerTeacher = $this->statsdao->TotalStudentPerTeacher($teacher_id);
            $averageStudentPerCourse = $studentsPerTeacher->StudentsPerTeacher / $totalcourses;

            $this->session->set('totalcourses', $totalcourses);
            $this->session->set('studentsPerTeacher', $studentsPerTeacher->StudentsPerTeacher);
            include_once __DIR__ . '/../View/teacher/statistics.php';
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function AdminStats() {
        $courses = $this->statsdao->CountCourseByAdmin();
        $students = $this->statsdao->CountStudents();
        $teachers = $this->statsdao->CountTeachers();
        $topcourse = $this->statsdao->TopCourse();
        $coursesPerCategory = $this->statsdao->CousesPerCategorie();

        $this->session->set('totalcourses', $courses);
        $this->session->set('students', $students);
        $this->session->set('teachers', $teachers);

        include_once  __DIR__ . '/../View/admin/statistics.php';
    }

}