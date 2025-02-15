<?php

namespace Younes\Youdemy\DAO;

use PDO;

use Exception;
class AdminDAO
{
    private $db;
    private $table = "Persons";

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function manageTeacher() {
        $sql = "SELECT * FROM inactiveAccount WHERE fk_role_id = 2";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function displayUsers() {
        $sql = "SELECT * FROM Users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function activeTeacherAccount($id) {
        $sql = "UPDATE {$this->table} SET user_status = 'active' WHERE user_id = :user_id AND fk_role_id = 2";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user_id', $id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error while activing teacher account :" . $e->getMessage();
            return null;
        }
    }

    public function activeAccount($id) {
        $sql = "UPDATE {$this->table} SET user_status = 'active' WHERE user_id = :user_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user_id', $id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error while activing User account :" . $e->getMessage();
            return null;
        }
    }
    public function suspendAccount($id) {
        $sql = "UPDATE {$this->table} SET user_status = 'inactive' WHERE user_id = :user_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user_id', $id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error while suspend teacher account :" . $e->getMessage();
            return null;
        }
    }

    public function deleteAccount($id) {
        $sql = "DELETE FROM {$this->table} WHERE user_id = :user_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user_id', $id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error while deleting account :" . $e->getMessage();
            return null;
        }
    }

    public function deleteCourse($id) {
        return $this->CourseDAO->delete($id);
    }
    public function updateCourse($instance) {
        return $this->CourseDAO->update($instance);
    }
}