<?php

namespace Younes\Youdemy\DAO;

use Exception;
class EnrollmentDAO
{
    private $db;
    private $table = "Enrollments";

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function enrollInCourse($instance) {
        $sql = "INSERT INTO {$this->table} (fk_user_id, fk_course_id) VALUES (:fk_user_id, :fk_course_id)";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':fk_user_id', $instance->fk_user_id);
            $stmt->bindParam(':fk_course_id', $instance->fk_course_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error enroll : " . $e->getMessage();
            return null;
        }
    }
    public function cancelEnrollment($enrollment_id) {
        $sql = "UPDATE {$this->table} SET enrollmenent_status = 'inactive' WHERE enrollment_id = :enrollment_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':enrollment_id', $enrollment_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error on canceling enrollmenet " . $e->getMessage();
            return null;
        }
    }
}