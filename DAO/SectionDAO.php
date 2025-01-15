<?php

namespace Younes\Youdemy\DAO;

use Younes\Youdemy\DAO\Interfaces\CRUDInterface;

use PDO;
use Exception;
use Younes\Youdemy\Entity\Section;

class SectionDAO implements CRUDInterface
{
    private $db;
    private $table = "Sections";

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($instanceSection) {
        $sql = "INSERT INTO {$this->table} (section_title, section_content, fk_course_id) VALUES (':section_title, :section_content, :fk_course_id')";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':section_title', $instanceSection->section_title);
            $stmt->bindParam(':section_content', $instanceSection->section_content);
            $stmt->bindParam(':fk_course_id', $instanceSection->fk_course_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error creating section" . $e->getMessage();
            return null;
        }
    }

    public function read($section_id) {
        $sql = "SELECT * FROM {$this->table} WHERE section_id = :section_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':section_id', $section_id);
            if($stmt->execute()) {
                return $stmt->fetchObject(Section::class);
            }
            return null;
        } catch (Exception $e) {
            echo "Error fetching section :" . $e->getMessage();
            return null;
        }
    }

    public function index() {
        $sql = "SELECT * FROM {$this->table}";
        try {
            $stmt = $this->db->prepare($sql);
            if($stmt->execute())
            {
                return $stmt->fetchAll(PDO::FETCH_CLASS, Section::class);
            }
            return [];
        } catch (Exception $e) {
            echo "Error fetching all section: " . $e->getMessage();
            return null;
        }
    }

    public function update($insatnceSection) {
        $sql = "UPDATE {$this->table} SET section_title = :section_title, section_content = :section_content WHERE section_id = :section_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':section_title', $insatnceSection->section_title);
            $stmt->bindParam(':section_content', $insatnceSection->section_content);
            $stmt->bindParam(':fk_course_id', $insatnceSection->fk_course_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error updating Section" . $e->getMessage();
            return null;
        }

    }
    public function delete($section_id) {
        $sql = "DELETE FROM {$this->table} WHERE section_id = :section_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':section_id', $section_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error deleting Section:" . $e->getMessage();
            return null;
        }
    }

}