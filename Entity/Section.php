<?php

namespace Younes\Youdemy\Entity;

use Younes\Youdemy\Helpers\Validator;
use Exception;

class Section
{
    private $section_id;
    private $section_title;
    private $section_content;
    private $isComplete;
    private $fk_course_id;

    public function __construct($section_id, $section_title, $section_content, $isComplete, $fk_course_id)
    {
        try {
            $this->section_id = $section_id ?  Validator::ValidateData($section_id) : null;
            $this->section_title = Validator::ValidateData($section_title);
            $this->section_content = Validator::ValidateData($section_content);
            $this->isComplete = Validator::ValidateData($isComplete);
            $this->fk_course_id = Validator::ValidateData($fk_course_id);
        } catch(Exception $e) {
            echo "Section Error : " . $e->getMessage();
        }
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }

}