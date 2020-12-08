<form action="index.php?action=getlog" method="post">
        <div>
        <p>Connexion</p>
        <label for="lemail">Email: </label>
        <input type="lemail" name="lemail" required></br>
        <label for="lpassword">Mot de passe: </label>
        <input type="lpassword" name="lpassword" required></br>
        <label for="cnxauto"><input type="checkbox" name="cnxauto" value="connexion auto">Connexion Auto</label></br>
        <input type="submit" value="connexion" name="signin"></br>
        <a href="index.php?action=members">Inscription</a>
        </div>
</form>