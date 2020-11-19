<?php $title = '';?>

<?php ob_start();?>

<form method="formsend">
        <div>
        <input type="name" name="pseudo">
        <input type="email" name="email">
        <input type="password" name="password">
        </div>
        <div>
        <input type="lemail" name="lemail">
        <input type="lpassword" name="lpassword">
        <input type="submit" value="connexion" name="login">
        <!--rediriger vers une page d'inscription-->
        <input type="submit" value="inscription" name="sigin">
        </div>
</form>



<?php  $menu = ob_get_clean();?>
