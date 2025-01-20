<?php

namespace Younes\Youdemy\DAO;

use Younes\Youdemy\Config\DBConnection;
use Exception;
use PDO;

class StatsDAO
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function CountCourseByTeacher($teacher_id) {
        $sql = "SELECT * FROM Courses WHERE fk_user_id = :fk_user_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':fk_user_id', $teacher_id);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (Exception $e) {
            echo "Error while Counting CourseByTeacher :" . $e->getMessage();
            return null;
        }
    }

    public function TotalStudentPerTeacher($teacher_id) {
        $sql = "SELECT * FROM TotalStudentPerTeacher WHERE fk_user_id = :fk_user_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':fk_user_id', $teacher_id);
            $stmt->execute();
            return $stmt->fetchObject();
        } catch (Exception $e) {
            echo "Error while countring student per teacher : " . $e->getMessage();
            return null;
        }
    }

    public function CountCourseByAdmin() {}


    public function TopCoursPerStudent () {}

    public function TopThreeTeachers() {}

    public function TotalCourseEnrolled () {}

    public function TotalStudentPerCourse() {}


}