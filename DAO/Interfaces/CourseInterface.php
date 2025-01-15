<?php

namespace Younes\Youdemy\DAO\Interfaces;

interface CourseInterface
{
    public function getCourseByTeacher($teacher_id);
    public function hideCourse($course_id);
    public function  publishCourse($course_id);
    public function approuveCourse($course_id);
    public function rejectCourse($course_id);

}