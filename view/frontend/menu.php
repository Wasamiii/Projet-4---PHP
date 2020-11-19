<?php $title = '';?>

<?php ob_start();?>

<form method="post">
        <div>
        <input type="email" name="email">
        <input type="password" name="password">
        <input type="inscription" value="Inscription" name="sigin">
        </div>
        <div>
        <input type="submit" value="connexion" name="login">
        </div>
</form>



<?php  $menu = ob_get_clean();?>
