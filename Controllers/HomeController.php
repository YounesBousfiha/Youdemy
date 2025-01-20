<?php

namespace Younes\Youdemy\Controllers;

use Parsedown;
use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\DAO\CourseDAO;
use Younes\Youdemy\DAO\EnrollmentDAO;
use Younes\Youdemy\Helpers\Session;
use Younes\Youdemy\DAO\CategorieDAO;

use Exception;
use Younes\Youdemy\Helpers\Validator;

class HomeController
{

    private $db;
    private $session;

    public function __construct()
    {
        $this->db = DBConnection::getConnection()->conn;
        $this->session = new Session();
    }

    public function index() {
        include_once __DIR__ . '/../View/index.php';
    }

    public function cataloguePage() {
        $limit = 3;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        try {
            $categoriesDAO = new CategorieDAO($this->db);
            $totalcategories = count($categoriesDAO->index());
            $categoriesDATA = $categoriesDAO->indexPagination($limit, $offset);

            $totalPages = ceil($totalcategories/ $limit);
            include_once __DIR__ . '/../View/catalogue.php';
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            return null;
        }
    }

    public function coursesByCategory($id) {
        try {
            $categorie_id = Validator::ValidateData($id);
            $courseDAO = new CourseDAO($this->db);
            $courseDATA = $courseDAO->getCourseByCategory($categorie_id);
            include_once __DIR__ . '/../View/course.php';
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            return null;
        }
    }

    public function courseDetails($id) {
        try {
            $fk_user_id = $_SESSION['user_id'];
            $course_id = Validator::ValidateData($id);
            $courseDAO = new CourseDAO($this->db);
            $enrollmentDao = new EnrollmentDAO($this->db);
            $enrollments = $enrollmentDao->isEnroll($fk_user_id, $course_id);
            $courseDATA = $courseDAO->CourseDetails($course_id);
            include_once __DIR__ . '/../View/student/course-details.php';
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            return null;
        }
    }

    public function courseContent($id) {
        $enrollementdao = new EnrollmentDAO($this->db);

        if(!$enrollementdao->isEnroll($_SESSION['user_id'], $id)) {
            $this->session->set('Error', 'You are not enrolled in this course');
            header('Location: http://localhost:3000/course/' . $id);
            return null;
        }

        try {
            $parsedown = new Parsedown();
            $course_id = Validator::ValidateData($id);
            $courseDAO = new CourseDAO($this->db);
            $courseDATA = $courseDAO->CourseDetails($course_id);

            $data = substr($courseDATA[0]->course_content, 1, -1);
            $data2 = substr($data, 0, -1);

            $html = $parsedown->text($data2);

            $html = str_replace("<h1>", '<h1 class="text-6xl font-bold my-4">', $html);
            $html = str_replace("<h2>", '<h2 class="text-3xl font-semibold my-3">', $html);
            $html = str_replace("<h3>", '<h2 class="text-2xl font-semibold my-3">', $html);
            $html = str_replace("<code>", '<code class="bg-gray-200 p-1 rounded">', $html);

            $courseComments = $courseDAO->getCourseComments($course_id);

            include_once __DIR__ . '/../View/student/course-content.php';
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            return null;
        }
    }

    public function search() {
        $search = $_POST['search'];
        $courseDAO = new CourseDAO($this->db);
        $searchResults= $courseDAO->search($search);

        include_once __DIR__ . '/../View/search.php';
    }
}