<?php

namespace Younes\Youdemy\DAO;

use Younes\Youdemy\DAO\Interfaces\CRUDInterface;
use PDO, Exception;
use Younes\Youdemy\Entity\Categorie;

class CategorieDAO implements CRUDInterface
{
    private $db;
    private $table = 'Categories';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($instanceCategorie) {
        $sql = "INSERT INTO {$this->table} (categorie_nom) VALUES (:categorie_nom)";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':categorie_nom', $instanceCategorie->categorie_nom);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error creating categorie: " . $e->getMessage();
            return null;
        }
    }

    public function read($categorie_id) {
        $sql = "SELECT * FROM {$this->table} WHERE categorie_id = :categorie_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':categorie_id', $categorie_id);
            return $stmt->fetchObject(Categorie::class);
        } catch (Exception $e) {

        }
    }
    public function index() {
        $sql = "SELECT * FROM {$this->table}";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, Categorie::class);
        } catch (Exception $e) {
            echo 'Error fetching categories: ' . $e->getMessage();
            return null;
        }
    }
    public function update($instanceCategorie) {
        $sql = "UPDATE {$this->table} SET categorie_nom = :categorie_nom WHERE categorie_id = :categorie_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':categorie_nom', $instanceCategorie->categorie_nom);
            $stmt->bindParam(':categorie_id', $instanceCategorie->categorie_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo 'Error updating categorie :' . $e->getMessage();
            return null;
        }
    }
    public function delete($categorie_id) {
        $sql = "DELETE FROM {$this->table} WHERE categorie_id = :categorie_id";
        try  {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute();
        } catch (Exception $e) {
            echo 'Error deleting categorie: ' . $e->getMessage();
            return null;
        }
    }
}