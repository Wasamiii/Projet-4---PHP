<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="public\CSS\style.css"/>
    </head> 
    <body>
        <?= require("menu.php") ?>
        <?= $content ?>
    </body>
    <footer>
    <?= require("footer.php") ?>  
    </footer>
</html>