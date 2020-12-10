<?php
namespace Wamp\www\model;

use Exception;

require_once("model/Manager.php");
class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id_post, authors, comment_text, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id_post = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(id_post, authors, comment_text, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }
    public function modifyComment($postId, $author, $modifyComment){
        $db = $this ->dbConnect();
        $modifyComment = $db->prepare('UPDATE commments SET comment(comment_id, authors, comment_text) WHERE `comments`.`id_post` = ?');
        $affecteModify = $modifyComment->execute(array($postId, $author,$modifyComment));

        return $affecteModify;
    }
}