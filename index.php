<?php
session_start();

require('controller/controller.php');
try { // On essaie de faire des choses
    if(isset($_GET['action'])){
        $callAction =$_GET['action'];

    }else{
        $callAction = "";
    }
    switch ($callAction) {
        case 'listPosts':
            listPosts();
        break;
        case 'post':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        break;
        case 'addPost':
            if(!empty($_POST['titlePost'])&& !empty($_POST['tinymce'])){
                adderPost($_POST['titlePost'],$_POST['tinymce']);
            }
        break;
        //Faire en 2 actions une pour afficher le formulaire l'autre pour traiter les formulaires
        case'modifyPoster':
            if(isset($_SESSION['admin']) && $_SESSION['admin'] == "1"){
                $post = $_GET['idPost'];
                modifyPoster($post);
            }else{
                header("Location: index.php");
            }
        break;
        case 'modifyPosting':
            $idPost = $_GET['idPost'];
            modfierPost($_POST['modtitlePost'],$_POST['tinymcemod'],$idPost);
        break;
        case 'supprPost':
             //appele la fonction suppr pour le post
            $idPost = $_GET['idPost'];
            supressionPost($idPost);
        break;
        case 'addComment':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    addComment($_GET['id'], $_SESSION['id'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiants de billet envoyé');
            }
        break;
        case 'suppprComment':
            // appele la fonction suppr pour le commentaire
            $suppridcomment = $_GET['idComment'];
            $idPost = $_GET['idPost'];
            supressionComment($suppridcomment,$idPost);
        break;
        case 'report':
            $idReport = $_GET['idComment'];
            $idPost = $_GET['idPost'];
            reportComments($idReport,$idPost);
        break;
        case'unreport':
            $idunReport = $_GET['idComment'];
            $idPost = $_GET['idPost'];
            unreportComment($idunReport,$idPost);
        break;
 
        case 'admin':
            if(isset($_SESSION['admin']) && $_SESSION['admin'] == "1"){
                admin();
            }else{
                header("Location: index.php");
            }
        break;
        case 'members':
            signup();
        break;
        case 'validSignup':
            $pseudo = $_POST['pseudo'];
            verifPseudo($pseudo);
            postsignup();
        break;
        case 'getlog':
            verifyLogin();
        break;
        case 'disconnect':
            disconnect();
        break;
        default:
        listPosts();
    }
}   
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}