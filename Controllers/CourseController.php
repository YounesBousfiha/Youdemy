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
    public function createCourse()
    {
        try {
            $courseInstance = new Course(
                null,
                $_POST['title'],
                $_POST['description'],
                $_FILES['image'],
                'inactive',
                'pending',
                $_POST['type'],
                $_POST['course_content'],
                $_SESSION['user_id'],
                $_POST['category_id']
            );
            // TODO : Handle tags many to many relationship
            var_dump($courseInstance->course_id);
            var_dump($courseInstance->course_nom);
            var_dump($courseInstance->course_desc);
            var_dump($courseInstance->course_miniature);
            var_dump($courseInstance->course_visibility);
            var_dump($courseInstance->course_status);
            var_dump($courseInstance->course_type);
            var_dump($courseInstance->course_content);
            var_dump($courseInstance->fk_user_id);
            var_dump($courseInstance->fk_categorie_id);

            //$this->courseDAO->create($courseInstance);
            //$this->session->set('Success', 'Course Created!');
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
        } finally {
            //header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }

}