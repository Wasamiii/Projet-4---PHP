<a href="index.php" id="logosite"><img src="public/img/45px-P_author.svg_1.png"
        alt="Logo du site avec une plume dans un encrier" id="logoscriptblog">
    <p class="logositetext">Jean Forteroche</p>
</a>
<div id="groupright">
    <?php
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
        {
?>
    <div id="groupButton">
        <a href="index.php?action=disconnect" id="disconnect">Deconnection</a>

        <?php        
                if($_SESSION['admin'] == "1"){
?>
        <a href="index.php?action=admin" id="administration">administration</a>
        <?php
        }

?>
    </div>
    <p id="bonjourPseudo"><?php echo 'Bonjour ' . $_SESSION['pseudo'];?></p>

    <?php
        }else{   
?>
    <div id="allForm">
        <form action="index.php?action=getlog" method="post" id="connexionForm">
            <p id="titleSigin">Connexion:</p>
            <input type="text" name="pseudo" placeholder="Pseudo" class="inputSigin" required>
            <input type="password" name="password" placeholder="Mot de passe" class="inputSigin" required>
            <input type="submit" value="connexion" name="signin" id="connexionSigin">
            <a href="index.php?action=members" id="singupLink">Inscription</a>
        </form>
    </div>
    <?php        
        }
        ?>

</div>