<?php
namespace Wamp\www\model; 

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id_post, title, text_post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM `post` ORDER BY date_post DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id_post, title, text_post, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM `post` WHERE id_post = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    //à modif
    public function supprPost($idPost){
        $db = $this->dbConnect();
        $supprPoster = $db-> prepare('DELETE FROM `post` WHERE id_post = ?');
        $supprPoster->execute(array($idPost));
        return $supprPoster;
    }
    //pas fini
    public function addPost($titlePost,$textPost){
        $db=$this->dbConnect();
        $adderPost = $db->prepare('INSERT INTO post(id_post, title, text_post, date_post) VALUES(?, ?, ?, NOW())');
        $adderPost->execute(array($titlePost,$textPost));
        return $adderPost;
    }
}
