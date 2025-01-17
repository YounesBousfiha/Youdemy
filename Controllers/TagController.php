<?php

namespace Younes\Youdemy\Controllers;
use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\Helpers\Session;
use Younes\Youdemy\DAO\TagDAO;
use Younes\Youdemy\Entity\Tag;
use Exception;
use Younes\Youdemy\Helpers\Validator;

class TagController
{
    private $db;
    private $session;

    public function __construct()
    {
        $this->db = DBConnection::getConnection()->conn;
        $this->session = new Session();
    }

    public function tagPage() {
        $tagDAO = new TagDAO($this->db);
        $data = $tagDAO->index();
        include_once __DIR__ . '/../View/admin/tag-management.php';
    }

    public function createTag() {
        $tags = $_POST['tags'];
        $tagDAO = new TagDAO($this->db);
        try {
            foreach ($tags as $tag) {
                $tagInstance = new Tag(null, $tag['nom']);
                $tagDAO->create($tagInstance);
            }
            header('Location:' . $_SERVER['HTTP_REFERER']);
            $this->session->set('Success', 'Tag Created!');
        } catch(Exception $e) {
            $this->session->set('Error', $e->getMessage());
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function deleteTag() {
        try {
            $tag_id = Validator::ValidateData($_POST['tag_id']);
        } catch (Exception $e) {
            $this->session->set('Error', 'Empty tag_id');
            return;
        }

        $tagDAO = new TagDAO($this->db);
        try {
            $tagDAO->delete($tag_id);
            $this->session->set('Success', 'Tag is deleted');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
            $this->session->set('Error', $e->getMessage());
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function updateTag($id, $newnom) {
        $newTag = new Tag($id, $newnom);
        $tagDAO = new TagDAO($this->db);
        try {
            $tagDAO->update($newTag);
            $this->session->set('Success', 'Tag Updated!');
        } catch(Exception $e) {
            $this->session->set('Error', $e->getMessage());
        }
    }

}