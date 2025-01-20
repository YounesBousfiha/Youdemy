<?php

namespace Younes\Youdemy\DAO;

abstract class BaseDAO
{
    abstract  public function create($instanceCourse);
    abstract public function read($course_id);
}