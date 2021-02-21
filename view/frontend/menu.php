<a href="index.php" id="logosite"><img src="public/img/45px-P_author.svg_1.png" id="logoscriptblog"><p class="logositetext">Jean Forteroche</p></a>

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
<div id="allForm">
<form action="index.php?action=getlog" method="post" id="connexionForm">
        <p id="titleSigin">Connexion:</p>
        <input type="name" name="pseudo" placeholder="Pseudo" class="inputSigin" required>
        <input type="password" name="password" placeholder="Mot de passe" class="inputSigin" required>
        <input type="submit" value="connexion" name="signin" id="connexionSigin">
        <a href="index.php?action=members" id="singupLink">Inscription</a>
</form>
</div>
<?php        
        }
?>