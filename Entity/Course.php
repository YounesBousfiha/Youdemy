<?php

namespace Younes\Youdemy\Entity;

use Younes\Youdemy\Helpers\Validator;
use Exception;

class Course
{
    private $course_id;
    private $course_nom;
    private $course_desc;
    private $course_miniature;
    private $course_status;
    private $fk_user_id;
    private $fk_categorie_id;

    public function __construct($course_id, $course_nom,$course_desc , $course_miniature, $course_status, $fk_user_id, $fk_categorie_id) {
        try {
            $this->course_id = $course_id ? Validator::ValidateData($course_id) : null;
            $this->course_nom = Validator::ValidateData($course_nom);
            $this->course_desc = Validator::ValidateData($course_desc);
            $this->course_miniature = Validator::ValidateImage($course_miniature);
            $this->course_status = Validator::ValidateData($course_status);
            $this->fk_user_id = Validator::ValidateData($fk_user_id);
            $this->fk_categorie_id = Validator::ValidateData($fk_categorie_id);
        } catch(\Exception $e) {
            echo 'Course Error: '. $e->getMessage();
        }
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value)
    {
       $this->$property = $value;
    }
}