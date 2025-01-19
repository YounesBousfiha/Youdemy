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
        $sql = "INSERT INTO {$this->table} (categorie_nom, categorie_img) VALUES (:categorie_nom, :categorie_img)";
        try {
            $stmt = $this->db->prepare($sql);
            var_dump($instanceCategorie->categorie_nom);
            var_dump($instanceCategorie->categorie_img);
            $stmt->bindParam(':categorie_nom', $instanceCategorie->categorie_nom);
            $stmt->bindParam(':categorie_img', $instanceCategorie->categorie_img);
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
            return $stmt->fetchAll(Categorie::class);
        } catch (Exception $e) {
            echo 'Error reading categorie :' .$e->getMessage();
            return null;
        }
    }
    public function index() {
        $sql = "SELECT * FROM {$this->table}";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo 'Error fetching categories: ' . $e->getMessage();
            return null;
        }
    }

    public function indexPagination($limit, $offset) {
        $sql = "SELECT * FROM {$this->table} LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function update($instanceCategorie) {
        $sql = "UPDATE {$this->table} SET categorie_nom = :categorie_nom, categorie_img = :categorie_img WHERE categorie_id = :categorie_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':categorie_nom', $instanceCategorie->categorie_nom);
            $stmt->bindParam(':categorie_img', $instanceCategorie->categorie_img);
            $stmt->bindParam(':categorie_id', $instanceCategorie->categorie_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo 'Error updating categorie :' . $e->getMessage();
            return null;
        }
    }
    public function delete($categorie_id) {
        var_dump($categorie_id);
        $sql = "DELETE FROM {$this->table} WHERE categorie_id = :categorie_id";
        try  {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':categorie_id', $categorie_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo 'Error deleting categorie: ' . $e->getMessage();
            return null;
        }
    }
}