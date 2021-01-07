<?php
namespace Wamp\www\model;

require_once("model/Manager.php");
class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comments.id_post, comments.authors,members.members_id,members.pseudo, comments.comment_text, 
        DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') 
        AS comment_date_fr 
        FROM comments 
        INNER JOIN members ON comments.authors = members.members_id 
        WHERE comments.id_post = ? 
        ORDER BY comments.comment_date DESC');
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
   
    public function reportCommentOnAdmin()
    {
        $db = $this->dbConnect();
        $report = $db->prepare('SELECT * FROM comments WHERE signalement = "1"');
        $report->execute(array());
        return $report;
    }
}