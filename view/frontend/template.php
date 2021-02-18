<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="public/img/1138px-P_author.svg_1.png" type="image/png">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <link rel="stylesheet" href="public/CSS/style.css">
        <script src="/public/JS/main.js" type="text/javascript"></script>
    </head>
    <header>
        <?php require_once("menu.php")?>
    </header>
    <body>
        
        <?=$content?>
    </body>
    <footer>
    <?php require_once("footer.php")?>
    </footer>
</html>