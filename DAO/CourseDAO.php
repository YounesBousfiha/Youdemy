<?php

namespace Younes\Youdemy\DAO;

use Younes\Youdemy\DAO\Interfaces\CRUDInterface;

class CourseDAO implements CRUDInterface
{
    private $db;
    private $table = 'Courses';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($instanceCourse) {}
    public function read($course_id) {}
    public function index() {}
    public function update($instanceCourse) {}
    public function delete($course_id) {}

    public function getCourseByTeacher($teacher_id) {}
}