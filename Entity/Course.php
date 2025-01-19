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
    private $course_visibility;
    private $course_status;
    private $course_type;
    private $course_content;
    private $fk_user_id;
    private $fk_categorie_id;

    public $tags = [];

    public function __construct($course_id, $course_nom,$course_desc , $course_miniature, $course_visibility, $course_status, $course_type, $course_content, $fk_user_id, $fk_categorie_id) {
        try {
            $this->course_id = $course_id ? Validator::ValidateData($course_id) : null;
            $this->course_nom = $course_nom ? Validator::ValidateData($course_nom) : null;
            $this->course_desc = $course_desc ? Validator::ValidateData($course_desc) : null;
            $this->course_miniature = $course_miniature ? Validator::ValidateImage($course_miniature) : null;
            $this->course_visibility = $course_visibility ? Validator::ValidateData($course_visibility) : null;
            $this->course_status = $course_status ? Validator::ValidateData($course_status) : null;
            $this->course_type = $course_type ? Validator::ValidateData($course_type) : null;
            $this->course_content = $course_content ? Validator::ValidateData($course_content) : null;
            $this->fk_user_id = $fk_user_id ? Validator::ValidateData($fk_user_id) : null;
            $this->fk_categorie_id = $fk_categorie_id ? Validator::ValidateData($fk_categorie_id) : null;
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