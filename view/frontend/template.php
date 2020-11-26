<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="public\CSS\style.css"/>
    </head> 
    <body>
        <?php require("menu.php")?>
        <?= $content ?>
    </body>
    <footer>
    <?php require("footer.php")?>  
    </footer>
</html>