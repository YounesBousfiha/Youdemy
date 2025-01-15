<?php

namespace Younes\Youdemy\Entity;

use Younes\Youdemy\Helpers\Validator;
use Exception;

class Comment
{
    private $comment_id;
    private $comment_content;
    private $fk_user_id;
    private $fk_course_id;
    public function __construct($comment_id, $comment_content, $fk_user_id, $fk_course_id) {
        try {
            $this->comment_id = $comment_id ? Validator::ValidateData($comment_id) : null;
            $this->comment_content = Validator::ValidateData($comment_content);
            $this->fk_user_id = Validator::ValidateData($fk_user_id);
            $this->fk_course_id = Validator::ValidateData($fk_course_id);
        } catch (Exception $e) {
            echo "Comment Error: " . $e->getMessage();
        }
    }
    public function __get($property) {
        return $this->$property;
    }
    public function __set($property, $value) {
        $this->$property = $value;
    }

}