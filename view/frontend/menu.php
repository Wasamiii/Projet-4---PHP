<form method="post" action="index.php?action=getlog&amp;id=<?= $pseudo['members_id'] ?>">
        </br>
        <div>
        <p>Connexion</p>
        <label for="lemail">Email: </label>
        <input type="lemail" name="lemail"></br>
        <label for="lpassword">Mot de passe: </label>
        <input type="lpassword" name="lpassword"></br>
        <input type="checkbox" name="cnxauto" value="connexion auto"><p id="connectauto">Connexion auto</p></br>
        <input type="submit" value="connexion" name="signin"></br>
        <a href="index.php?action=signup">Inscription</a>
        </div>
</form>