<?php
namespace Wamp\www\model;
require_once('model/Manager.php');

//!cela n'envoi rien c'est juste pour avoir la forme mais mettre login et sigin dans le même fichier
/* faire en sorte que cela fasse un envoi à la table members*/
class Singup extends Manager 
{
    
    public function postsignup(){
        
        if(isset($_POST['signup'])){
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            extract($_POST);

            if(!empty($password) && !empty($cpassword) && !empty($email) && !empty($pseudo)){
                
                if($password == $cpassword){
                    $pass_hache = password_hash($password, PASSWORD_DEFAULT);
                            $register = $db->prepare('INSERT INTO members(pseudo, password, email,members_date,admin) VALUES(:pseudo, :password, :email, NOW())',0);
                            $register->execute(array(
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