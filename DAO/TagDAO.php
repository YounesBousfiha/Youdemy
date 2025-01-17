<?php

namespace Younes\Youdemy\DAO;

use Younes\Youdemy\DAO\Interfaces\CRUDInterface;
use Younes\Youdemy\Entity\Tag;
use PDO;
use Exception;

class TagDAO implements CRUDInterface
{
    private $db;
    private $table = "Tags";

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($instanceTag) {
        $sql = "INSERT INTO {$this->table} (tag_nom) VALUES (:tag_nom)";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':tag_nom', $instanceTag->tag_nom);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error creating tag" . $e->getMessage();
            return null;
        }
    }

    public function read($tag_id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE tag_id = :tag_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':tag_id', $tag_id);
            if ($stmt->execute()) {
                return $stmt->fetchObject(Tag::class);
            }
            return null;
        } catch (Exception $e) {
            echo "Error fetching tag: " . $e->getMessage();
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
        } catch (Exception $e) {
            echo "Error fetching all tag: " . $e->getMessage();
            return null;
        }
    }

    public function update($instanceTag) {
        $sql = "UPDATE {$this->table} SET tag_nom = :tag_nom WHERE tag_id = :tag_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':tag_nom', $instanceTag->tag_nom);
            $stmt->bindParam(':tag_id', $instanceTag->tag_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error updating tag: " . $e->getMessage();
            return null;
        }
    }
    public function delete($tag_id) {
        $sql = "DELETE FROM {$this->table} WHERE tag_id = :tag_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':tag_id', $tag_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error deleting Tag :" . $e->getMessage();
            return null;
        }
    }
}