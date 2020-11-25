
<form method="formsend">
        <div>
        <!--Temporaire coté inscription cela sera une autre page 
        input sera remplacé par une balise <a></a> qui redirigera dessus -->
        <p>Inscription</p>
        <label for="pseudo">Pseudo: </label>
        <input type="name" name="pseudo"></br>
        <label for="email">Email: </label>
        <input type="email" name="email"></br>
        <label for="password">Mot de Passe: </label>
        <input type="password" name="password"></br>
        <label for="cpassword">Confirmer mot de Passe: </label>
        <input type="password" name="cpassword"></br>        
        <input type="submit" value="inscription" name="sigin">
        </div>
        </br>
        <div>
        <p>Connexion</p>
        <label for="lemail">Email: </label>
        <input type="lemail" name="lemail"></br>
        <label for="lpassword">Mot de passe: </label>
        <input type="lpassword" name="lpassword"></br>
        <input type="checkbox" name="cnxauto" value="connexion auto"><p id="connectauto">Connexion auto</p></br>
        <input type="submit" value="connexion" name="login">
        </div>
</form>