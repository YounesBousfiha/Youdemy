<?php

namespace Younes\Youdemy\Controllers;

use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\DAO\CategorieDAO;
use Younes\Youdemy\DAO\CourseDAO;
use Younes\Youdemy\DAO\TagDAO;
use Younes\Youdemy\Entity\Course;
use Younes\Youdemy\Helpers\Session;

use Exception;

class CourseController
{

    private $courseDAO;
    private $session;
    private $db;

    public function __construct()
    {
        $this->db = DBConnection::getConnection()->conn;
        $this->courseDAO = new CourseDAO(DBConnection::getConnection()->conn);
        $this->session = new Session();
    }

    public function coursePage() {
        $courses = $this->courseDAO->index();
        require_once __DIR__ . '/../View/teacher/course-management.php';
    }

    public function createCoursePage() {
        $categorieDao = new CategorieDAO($this->db);
        $tagsDao = new TagDAO($this->db);
        $categories = $categorieDao->index();
        $tags = $tagsDao->index();
        require_once __DIR__ . '/../View/teacher/course-create.php';
    }
    public function createCourse() {
        try {
            $courseInstance = new Course(null, $_POST['title'], $_POST['description'], $_POST['miniature'], $_POST['visibility'], $_POST['status'], $_POST['type'], $_POST['content'], $_POST['user_id'], $_POST['category_id']);
            $this->courseDAO->create($courseInstance);
            $this->session->set('Success', 'Course Created!');
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
        } finally {
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }

}