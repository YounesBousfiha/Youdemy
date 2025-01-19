<?php

namespace Younes\Youdemy\Controllers;

use Younes\Youdemy\Config\DBConnection;
use Younes\Youdemy\DAO\CommentDAO;
use Younes\Youdemy\Entity\Comment;
use Younes\Youdemy\Helpers\Session;
use Younes\Youdemy\Helpers\Validator;

use Exception;

class CommentController
{
    private $db;
    private $session;

    public function __construct()
    {
        $this->db = DBConnection::getConnection()->conn;
        $this->session = new Session();
    }

    public function commentPage() {
        $commentdao = new CommentDAO($this->db);
        $comments = $commentdao->index();
        include_once __DIR__ . '/../View/admin/comment-management.php';
    }

    public function createComment() {
        try {
            $comment = Validator::ValidateData($_POST['comment_content']);
            $user_id = $_SESSION['user_id'];
            $course_id = Validator::ValidateData($_POST['course_id']);

            $instanceComment = new Comment(null, $comment, $user_id, $course_id);
        } catch (Exception $e) {
            $this->session->set('Error', 'Missing comment');
        }

        $commentdao = new CommentDAO($this->db);
        if($commentdao->create($instanceComment)) {
            $this->session->set('Success', 'Comment created!');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set('Error', 'Failed to create comment');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function deleteComment() {
        try {
            $comment_id = Validator::ValidateData($_POST['comment_id']);
        } catch (Exception $e) {
            $this->session->set('Error', 'Missing comment_id');
        }

        $commentdao = new CommentDAO($this->db);
        if($commentdao->delete($comment_id)) {
            $this->session->set('Success', 'Comment deleted!');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set('Error', 'Failed to delete comment');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

}