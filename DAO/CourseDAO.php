<?php

namespace Younes\Youdemy\DAO;

use Younes\Youdemy\DAO\Interfaces\CourseInterface;
use Younes\Youdemy\DAO\Interfaces\CRUDInterface;
use PDO, Exception;
use Younes\Youdemy\Entity\Course;


// TODO: Overide in the Section ( Better) to make the Course have different Docs & Vid
class CourseDAO implements CRUDInterface, CourseInterface
{
    private $db;
    private $table = 'Courses';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($instanceCourse) {
        $sql = "INSERT INTO {$this->table} (course_nom, course_desc, course_miniature, course_status, course_type, course_content, fk_user_id, fk_categorie_id) VALUES (:course_nom, :course_desc, :course_miniature, :course_status, :course_type, :course_content :fk_user_id, :fk_categorie_id)";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':course_nom', $instanceCourse->course_nom);
            $stmt->bindParam(':course_desc', $instanceCourse->course_desc);
            $stmt->bindParam(':course_miniature', $instanceCourse->course_miniature);
            $stmt->bindParam(':course_status', $instanceCourse->course_status);
            $stmt->bindParam(':course_type', $instanceCourse->course_type);
            $stmt->bindParam(':course_content', $instanceCourse->course_content);
            $stmt->bindParam(':fk_user_id', $instanceCourse->fk_user_id);
            $stmt->bindParam(':fk_categorie_id', $instanceCourse->fk_categorie_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error creating course: " . $e->getMessage();
            return null;
        }
    }
    public function read($course_id) {
        $sql = "SELECT * FROM {$this->table} WHERE course_id = :course_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':course_id', $course_id);
            $stmt->execute();
            return $stmt->fetchObject(Course::class);
        } catch (Exception $e) {
            echo "Error fetching course:" . $e->getMessage();
            return null;
        }
    }
    public function index() {
        $sql = "SELECT * FROM {$this->table}";
        try {
            $stmt = $this->db->prepare($sql);
            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
            return [];
        } catch(Exception $e) {
            echo "Error fetching Courses: ". $e->getMessage();
            return null;
        }
    }

    public function update($instanceCourse) {
        $sql = "UPDATE {$this->table} course_nom = :course_nom, course_desc = :course_desc, course_content = :course_content) SET WHERE course_id = :course_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':course_nom', $instanceCourse->course_nom);
            $stmt->bindParam(':course_desc', $instanceCourse->course_desc);
            $stmt->bindParam(':course_content', $instanceCourse->course_content);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error updating course: " . $e->getMessage();
            return null;
        }
    }
    public function delete($course_id) {
        $sql = "DELETE FROM {$this->table} WHERE course_id = :course_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':course_id', $course_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error while deleting course:" . $e->getMessage();
            return null;
        }
    }

    public function getCourseByTeacher($teacher_id) {
        $sql =  "SELECT * FROM {$this->table} WHERE fk_user_id = :fk_user_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':fk_user_id', $teacher_id);
            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
            return [];
        } catch (Exception $e) {
            echo "Error while fetching teacher course: " . $e->getMessage();
            return null;
        }
    }

    public function publishCourse($course_id) {
        $sql = "UPDATE {$this->table} SET course_visibility = 'active' WHERE course_id = :course_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':course_id', $course_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error approve course :" . $e->getMessage();
            return null;
        }
    }
    public function hideCourse($course_id) {
        $sql = "UPDATE {$this->table} SET course_visibility = 'inactive' WHERE course_id = :course_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':course_id', $course_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error hiding course :" . $e->getMessage();
            return null;
        }
    }

    public function approuveCourse($course_id) {
        $sql = "UPDATE {$this->table} SET course_status = 'approved' WHERE course_id = :course_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':course_id', $course_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error approving course: " . $e->getMessage();
            return null;
        }
    }
    public function rejectCourse($course_id) {
        $sql = "UPDATE {$this->table} SET course_status = 'rejected' WHERE course_id = :course_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':course_id', $course_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error approving course: " . $e->getMessage();
            return null;
        }
    }
}