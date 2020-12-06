<?php
namespace Wamp\www\model;
require_once('model/Manager.php');

//!cela n'envoi rien c'est juste pour avoir la forme mais mettre login et sigin dans le même fichier
/* faire en sorte que cela fasse un envoi à la table members*/
/* a mon avis il faudrais mettre tout dans signupView.php sauf la partie $register qui doit rester ici*/
class Members extends Manager 
{
    
    public function postsignup($pseudo,$email,$pass_hache){
                    $db = $this->dbConnect();
                    $register = $db->prepare('INSERT INTO members(pseudo, email, password, members_date) VALUES(:pseudo, :email, :password,  NOW())');
                    $register->execute(array(
                        'pseudo' => $pseudo,
                        'email' => $email,
                        'password' => $pass_hache));
                    echo "Le compte à été créée";
                    return $register;
                        
    }
    public function getsignup($pseudo){
        $db = $this->dbConnect();
        $verifpseudo = $db->prepare('SELECT pseudo FROM members WHERE pseudo=?');
        $verifpseudo -> execute(array($pseudo));
        $count = $verifpseudo -> rowCount();
        return $count;
    }
}

?>