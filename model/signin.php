<?php 
namespace Wamp\www\model;
require_once('model/Manager.php');
require_once('signup.php');
//!cela ne fait rien c'est juste pour avoir la forme mais mettre login et sigin dans le même fichier

class Login extends Manager
{/*à déplacer dans le controller.php tout sauf la partie $req qui va aller dans signup.php*/
    public function getlog(){
        if(isset($_POST['signin'])){
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            //  Récupération de l'utilisateur et de son pass hashé
            global $db;//provisoire car il y à une erreur avec $db
            $req = $db->prepare('SELECT * FROM members WHERE pseudo = :pseudo');
            $req->execute(['pseudo' => $pseudo]);
            $resultat = $req->fetch();
            
            // Comparaison du pass envoyé via le formulaire avec la base
            $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
            
            if (!$resultat)
            {
                echo 'Mauvais identifiant !';
            }
            else
            {
                if ($isPasswordCorrect) {
                    $_SESSION['id'] = $resultat['id'];
                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['admin']= $resultat['admin'];
                    echo 'Bienvenu  '. $_SESSION['pseudo'].' !';
                
                if(isset($_POST['cnxauto'])){
                    // setcookie('pseudo', $resultat['pseudo'], time()+(5*60),null,null,false,true);
                    // setcookie('pass_hache', $resultat['password'], time() + (5*60),null,null,false,true);
                }else{
                    echo "Pas de cookie enregistré";
                }
            }else {
                    echo 'Mauvais mot de passe !';
                }
            }
        }
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
        {
            echo 'Bonjour ' . $_SESSION['pseudo'];
        }else{
            if(isset($_COOKIE['pseudo'])){
                echo "Bonjour : " . $_COOKIE['pseudo'];
            }else{
                echo 'erreur pas de session ni de cookie.';
            }
        }
    }
}
?>