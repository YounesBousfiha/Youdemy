<?php

namespace Younes\Youdemy\DAO;

use Younes\Youdemy\DAO\Interfaces\CRUDInterface;
use PDO;
use Exception;
use Younes\Youdemy\Entity\Comment;

class CommentDAO implements CRUDInterface
{
    private $db;
    private $table = 'Comments';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($instanceComment) {
        $sql = "INSERT INTO {$this->table} (comment_content, fk_user_id, fk_course_id) VALUES (:comment_content, :fk_user_id, :fk_course_id)";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':comment_content', $instanceComment->comment_content);
            $stmt->bindParam(':fk_user_id', $instanceComment->fk_user_id);
            $stmt->bindParam(':fk_course_id', $instanceComment->fk_course_id);
            if($stmt->execute()) {
                return $this->db->lastInsertId();
            }
            return null;
        } catch (Exception $e) {
            echo "Error creating comment : " .$e->getMessage();
            return null;
        }
    }
    public function read($comment_id) {
        $sql = "SELECT * FROM {$this->table} WHERE comment_id = :comment_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':comment_id', $comment_id);
            if($stmt->execute()) {
                return $stmt->fetchObject(Comment::class);
            }
            return null;
        } catch (Exception $e) {
            echo "Error reading comment :" . $e->getMessage();
            return null;
        }
    }
    public function index() {
        $sql = "SELECT * FROM commenttoadmin";
        try {
            $stmt= $this->db->prepare($sql);
            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
            return [];
        } catch(Exception $e) {
            echo "Error fetching comments :" . $e->getMessage();
            return null;
        }
    }
    public function update($instanceComment) {

        $sql = "UPDATE {$this->table} SET comment_content = :comment_content WHERE comment_id = :comment_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':comment_content', $instanceComment->comment_content);
            $stmt->bindParam(':comment_id', $instanceComment->comment_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error updating comment: " . $e->getMessage();
            return null;
        }
    }
    public function delete($comment_id) {
        $sql = "DELETE FROM {$this->table} WHERE comment_id = :comment_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':comment_id', $comment_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error deleting comment: " . $e->getMessage();
            return null;
        }
    }
}