<?php
namespace Wamp\www\model;
require_once('model/manager.php');

//!cela ne fait rien c'est juste pour avoir la forme mais mettre login et sigin dans le même fichier
class Singin extends Manager 
{
    
    function postsigin(){
        if(isset($_POST['sigin'])){
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            extract($_POST);

            if(!empty($password) && !empty($cpassword) && !empty($email) && !empty($pseudo)){
                
                if($password == $cpassword){
                    $pass_hache = password_hash($password, PASSWORD_DEFAULT);

                            $req = $db->prepare('INSERT INTO membres(pseudo, password, email) VALUES(:pseudo, :password, :email)');
                            $req->execute(array(
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'password' => $pass_hache));
                            echo "Le compte à été créée";
                            
                        
                }else{
                    echo "Cet email existe déjà";
                    }
                }
        }
    }
}
?>