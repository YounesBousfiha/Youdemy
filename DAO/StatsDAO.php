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

    public function CountCourseByAdmin() {
        $sql = "SELECT * FROM Courses";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function CountStudents() {
        $sql = "SELECT * FROM Persons WHERE fk_role_id = 3";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function  CountTeachers() {
        $sql = "SELECT * FROM Persons WHERE fk_role_id = 2";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }


    public function TopCourse () {
        $sql = "SELECT * FROM BestCourse";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function CousesPerCategorie() {
        $sql = " SELECT * FROM CoursesPerCategory";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function TopThreeTeachers() {
        $sql = "SELECT * FROM TopThreeTeacher";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
    }



}