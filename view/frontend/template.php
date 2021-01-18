<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <link rel="stylesheet" href="public/CSS/style.css">
    </head> 
    <body>
        <?php require_once("menu.php")?>
        <?= $content ?>
    </body>
    <footer>
    <?php require_once("footer.php")?>  
    </footer>
</html>