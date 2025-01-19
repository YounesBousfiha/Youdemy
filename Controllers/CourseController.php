<?php

namespace Younes\Youdemy\Controllers;

use Parsedown;
use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\DAO\CategorieDAO;
use Younes\Youdemy\DAO\CourseDAO;
use Younes\Youdemy\DAO\TagDAO;
use Younes\Youdemy\Entity\Course;
use Younes\Youdemy\Helpers\Session;

use Exception;
use Younes\Youdemy\Helpers\Validator;

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

    public function getAllCourse() {
        $courses = $this->courseDAO->getAllCourse();
        require_once __DIR__ . '/../View/admin/course-management.php';
    }

    public function coursePage() {
        $id = $_SESSION['user_id'] ?? null;
        $courses = $this->courseDAO->index($id);
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
            $tags = $_POST['tags'] = $_POST['tags'] ?? [];
            $courseInstance->tags = $tags;

            $this->courseDAO->create($courseInstance);
            $this->session->set('Success', 'Course Created!');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function deleteCourse() {
        try {
            $course_id = Validator::ValidateData($_POST['course_id']);
            $this->courseDAO->delete($course_id);
            $this->session->set('Success', 'Course Deleted!');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function updateCourse()
    {
        try {
            $courseInstance = new Course(
                $_POST['course_id'],
                null,
                $_POST['course_desc'],
                $_FILES['image'],
                $_POST['course_visibility'],
                null,
                null,
                $_POST['course_content'],
                null,
                null
            );
            $this->courseDAO->update($courseInstance);
            $this->session->set('Success', 'Course Updated!');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }


    public function courseTest() {
        $parsedown = new Parsedown();
        $course = $this->courseDAO->read(3);
        $data = substr($course->course_content, 6, -1);
        $data2 = substr($data, 0, -5);
        $html = $parsedown->text($data2);

        $html = str_replace("<h1>", '<h1 class="text-6xl font-bold my-4">', $html);
        $html = str_replace("<h2>", '<h2 class="text-3xl font-semibold my-3">', $html);
        $html = str_replace("<code>", '<code class="bg-gray-200 p-1 rounded">', $html);

        //require_once __DIR__ . '/../View/teacher/course-test.php';
    }

    public function approuve() {
        try {
            $course_id = Validator::ValidateData($_POST['course_id']);
            $this->courseDAO->approuveCourse($course_id);
            $this->session->set('Success', 'Course Approved!');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function reject() {
        try {
            $course_id = Validator::ValidateData($_POST['course_id']);
            $this->courseDAO->rejectCourse($course_id);
            $this->session->set('Success', 'Course Rejected!');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}