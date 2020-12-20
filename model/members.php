<?php
namespace Wamp\www\model;
require_once('model/Manager.php');

/* faire en sorte que cela fasse un envoi à la table members*/
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
        $verifpseudo = $db->prepare('SELECT pseudo FROM members WHERE pseudo = ?');
        $verifpseudo -> execute(array($pseudo));
        $count = $verifpseudo -> rowCount();
        return $count;
    }
    public function getlogin(){
        $db = $this->dbConnect();
        $pseudo = $_POST['pseudo'];
        $req = $db->prepare('SELECT * FROM members WHERE pseudo = :pseudo');
            $req->execute(['pseudo' => $pseudo]);
            $resultat = $req->fetch();
            return $resultat;
    }
}

?>