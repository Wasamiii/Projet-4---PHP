<a href="index.php" id="logosite"><img src="public/img/1138px-P_author.svg_1.png" id="logoscriptblog"><p class="logositetext">Jean Forteroche</p></a>

<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
    {
            ?>       
            <a href="index.php?action=disconnect" id="disconnect">Deconnection</a>
           
<?php        
        if($_SESSION['admin'] == "1"){?>
        <a href="index.php?action=admin" id="administration">administration</a>
<?php
        }

?>
 <p id="bonjourPseudo"><?php echo 'Bonjour ' . $_SESSION['pseudo'];?></p>

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