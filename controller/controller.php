<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new Wamp\www\model\PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new Wamp\www\model\PostManager();
    $commentManager = new Wamp\www\model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $modifyComment = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new Wamp\www\model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function modifyComment($postId, $author, $modifyComment)
{
    $commentManager = new Wamp\www\model\CommentManager();

    $affecteModify = $commentManager->modifyComment($postId, $author,$modifyComment);

    if($affecteModify == false){
        throw new Exception('Impossible de modifier le commentaire ! ');
    }
    else{
        header('Location: index.php?action=post&id='.$postId);
    }
}