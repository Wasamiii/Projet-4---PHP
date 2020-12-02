
<form method="post" action="index.php?action=signup&amp;id=<?= $signup['members_id'] ?>">
    <div>
        <p>Inscription</p>
        <label for="pseudo">Pseudo: </label>
        <input type="name" name="pseudo" required></br>
        <label for="email">Email: </label>
        <input type="email" name="email" required></br>
        <label for="password">Mot de Passe: </label>
        <input type="password" name="password" placeholder="password"required></br>
        <label for="cpassword">Confirmer mot de Passe: </label>
        <input type="password" name="cpassword"required></br>        
        <input type="submit" name="signup">
        </div>
</form>
<div>
<p><a href="index.php">Retour à la page principale</a>
</div>
