<a href="index.php">Blog</a>

<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
    {
        echo 'Bonjour ' . $_SESSION['pseudo'];?>
        <a href="index.php?action=disconnect">Deconnection</a></br>
<?php
    }else{

    
?>

<form action="index.php?action=getlog" method="post">
        <div>
        <p>Connexion</p>
        <label for="pseudo">Pseudo: </label>
        <input type="name" name="pseudo" required></br>
        <label for="password">Mot de passe: </label>
        <input type="password" name="password" required></br>
        <input type="submit" value="connexion" name="signin"></br>
        </div>
</form>
        </br>
        <a href="index.php?action=members">Inscription</a>
<?php        
        }
?>