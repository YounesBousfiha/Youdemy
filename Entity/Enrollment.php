<?php

namespace Younes\Youdemy\Entity;

use Younes\Youdemy\Helpers\Validator;

class Enrollment
{
    private $enrollment_id;
    private $enrollment_status;
    private $fk_user_id;
    private $fk_course_id;

    public function __construct($enrollment_id, $enrollment_status, $fk_user_id, $fk_course_id) {
        try {
            $this->enrollment_id = $enrollment_id ? Validator::ValidateData($enrollment_id) : null;
            $this->enrollment_status = Validator::ValidateData($enrollment_status);
            $this->fk_user_id = Validator::ValidateData($fk_user_id);
            $this->fk_course_id = Validator::ValidateData($fk_course_id);
        } catch (\Exception $e) {
            echo "Enrollment Error :" . $e->getMessage();
        }
    }

    public function __get($property) {
        return $this->$property;
    }

    public function __set($property, $value){
        $this->$property = $value;
    }
}