<?php ob_start();?>

<form method="post">
        <input type="email" name="email">
        <input type="password" name="password">
        <input type="inscription" value="Inscription" name="sigin">
        <input type="connexion" value="connexion" name="login">
        </form>

<?php  $menu = ob_get_clean();?>
<?php require('view/frontend/template.php'); ?>