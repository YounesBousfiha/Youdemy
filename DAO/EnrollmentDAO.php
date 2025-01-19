<?php

namespace Younes\Youdemy\DAO;

use Exception;
use PDO;

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
        $sql = "DELETE FROM {$this->table} WHERE enrollment_id = :enrollment_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':enrollment_id', $enrollment_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error on canceling enrollment " . $e->getMessage();
            return null;
        }
    }

    public function studentEnrolledByTeacher($course_id) {
        $sql = "SELECT * FROM EnrolledStudents WHERE teacher_id = :teacher_id AND course_id = :course_id";
        $teacher_id = $_SESSION['user_id'];
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':teacher_id', $teacher_id);
            $stmt->bindParam(':course_id', $course_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo "Error fetching Student enrolled : " . $e->getMessage();
            return null;
        }
    }

    public function getEnrollmentsByUser($fk_user_id) {
        $sql = "SELECT * FROM MyCourses WHERE fk_user_id = :fk_user_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':fk_user_id', $fk_user_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo "Error fetching enrollments : " . $e->getMessage();
            return null;
        }
    }

    public function isEnroll($fk_user_id, $course_id) {
        $sql = "SELECT * FROM {$this->table} WHERE fk_user_id = :fk_user_id AND fk_course_id = :fk_course_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':fk_user_id', $fk_user_id);
            $stmt->bindParam(':fk_course_id', $course_id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo "Error fetching enrollments : " . $e->getMessage();
            return null;
        }
    }
}