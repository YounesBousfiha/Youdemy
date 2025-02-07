<?php

namespace Younes\Youdemy\DAO;

use Younes\Youdemy\DAO\Interfaces\CRUDInterface;
use PDO, Exception;
use Younes\Youdemy\Entity\Course;


class CourseDAO implements CRUDInterface
{
    private $db;
    private $table = 'Courses';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($instanceCourse) {
        $sql = "CALL createcourse(:course_nom, :course_desc, :course_miniature, :course_status, :course_type, :course_content, :fk_user_id, :fk_categorie_id)";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':course_nom', $instanceCourse->course_nom);
            $stmt->bindParam(':course_desc', $instanceCourse->course_desc);
            $stmt->bindParam(':course_miniature', $instanceCourse->course_miniature);
            $stmt->bindParam(':course_status', $instanceCourse->course_status);
            $stmt->bindParam(':course_type', $instanceCourse->course_type);
            $stmt->bindParam(':course_content',$instanceCourse->course_content);
            $stmt->bindParam(':fk_user_id', $instanceCourse->fk_user_id);
            $stmt->bindParam(':fk_categorie_id', $instanceCourse->fk_categorie_id);
            $stmt->execute();
            $course_id = $stmt->fetch();
            foreach ($instanceCourse->tags as $tag) {
                $sql = "INSERT INTO Course_tags (fk_course_id, fk_tag_id) VALUES (:fk_course_id, :fk_tag_id)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':fk_course_id', $course_id['LAST_INSERT_ID()']);
                $stmt->bindParam(':fk_tag_id', $tag);
                $stmt->execute();
            }
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
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                return new Course(
                    $data['course_id'],
                    $data['course_nom'],
                    $data['course_desc'],
                    $data['course_miniature'],
                    $data['course_visibility'],
                    $data['course_status'],
                    $data['course_type'],
                    $data['course_content'],
                    $data['fk_user_id'],
                    $data['fk_categorie_id'],
                );
            }
            return null;
        } catch (Exception $e) {
            echo "Error fetching course: " . $e->getMessage();
            return null;
        }
    }

    public function CourseDetails($id) {
        $sql = "SELECT * FROM CourseDetails WHERE course_id = :course_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':course_id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo "Error fetching course: " . $e->getMessage();
            return null;
        }

    }

    public function getAllCourse() {
        $sql = "SELECT * FROM CourseManagerByAdmin";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo "Error fetching course: " . $e->getMessage();
            return null;
        }
    }
    public function index($id) {
        $sql = "SELECT * FROM TeacherCourseView WHERE user_id = :user_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user_id', $id);
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
        $sql = "UPDATE {$this->table} SET course_desc = :course_desc, course_visibility = :course_visibility, course_miniature = :course_miniature, course_content = :course_content WHERE course_id = :course_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':course_desc', $instanceCourse->course_desc);
            $stmt->bindParam(':course_miniature', $instanceCourse->course_miniature);
            $stmt->bindParam(':course_visibility', $instanceCourse->course_visibility);
            $stmt->bindParam(':course_content', $instanceCourse->course_content);
            $stmt->bindParam(':course_id', $instanceCourse->course_id);
            var_dump($stmt->execute());
        } catch (Exception $e) {
            echo "Error updating course: " . $e->getMessage();
            return null;
        }
    }

    public function updateByAdmin($instanceCourse) {
        $sql = "UPDATE {$this->table} SET course_desc = :course_desc, course_content = :course_content WHERE course_id = :course_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':course_desc', $instanceCourse->course_desc);
            $stmt->bindParam(':course_content', $instanceCourse->course_content);
            $stmt->bindParam(':course_id', $instanceCourse->course_id);
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

    public function getCourseByCategory($category_id) {
        $sql =  "SELECT * FROM {$this->table} WHERE fk_categorie_id = :fk_categorie_id AND course_status = 'approved' AND course_visibility = 'active'";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':fk_categorie_id', $category_id);
            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
            return [];
        } catch (Exception $e) {
            echo "Error while fetching teacher course: " . $e->getMessage();
            return null;
        }
    }

    public function getCourseComments($course_id) {
        $sql = "SELECT * FROM  CourseComments WHERE course_id = :course_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':course_id', $course_id);
            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
            return [];
        } catch (Exception $e) {
            echo "Error fetching course comments: " . $e->getMessage();
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


    public function search($search) {
        $sql = "SELECT * FROM SearchResultsView WHERE course_nom LIKE :search OR course_desc LIKE :search";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':search', "%$search%");
            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
            return [];
        } catch (Exception $e) {
            echo "Error fetching search results: " . $e->getMessage();
            return null;
        }
    }
}