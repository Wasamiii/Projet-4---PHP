<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/members.php');

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

    if($affecteModify === false){
        throw new Exception('Impossible de modifier le commentaire ! ');
    }
    else{
        header('Location: index.php?action=post&id='.$postId);
    }
}

function signup(){
    $sign = new Wamp\www\model\Members();
    require('view/frontend/signupView.php');
}

function postsignup(){
    $register = new Wamp\www\model\Members();
    if(isset($_POST['inscription'])){
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        extract($_POST);

        if(!empty($password) && !empty($cpassword) && !empty($email) && !empty($pseudo)){
            //2 champ mdp différent retourne faux aussi 
            if($password == $cpassword){
                $pass_hache = password_hash($password, PASSWORD_DEFAULT);
                $signup = $register->postsignup($pseudo,$email,$pass_hache);
            }else{
                echo "Les mots de passe sont différents !";
                }
            }
        }
        //à modifier en fonction des différentes condition 2 pseudo identiques on retourne faux 
    if($signup = false){
        throw new Exception('Impossibilité de s\'inscrire pour l\'instant');
        
    }else{
        header('Location: index.php');
    }
}
function verifPseudo($pseudo){
    $verifpseudo = new Wamp\www\model\Members();
    if(isset($_POST['inscription'])){
        $pseudo = $_POST['pseudo'];
        $pseudos = $verifpseudo -> getsignup($pseudo);
        
        if($pseudos == 0){
            echo "Pseudo disponible";
        }else{
            throw new Exception('Pseudo non disponible');
        }
    }

}