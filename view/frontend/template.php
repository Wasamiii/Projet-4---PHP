<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public/img/1138px-P_author.svg_1.png" type="image/png">
    <title><?= $title ?></title>
    <meta name="description"
        content="J'écris mon nouveau roman sour forme de chapitres que je poste sur ce site n'hésitez pas à vous inscrire pour commenter mes différents projets.">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="public/CSS/style.css">

</head>

<body>
    <header>
        <?php require_once("menu.php")?>
    </header>

    <?=$content?>
    <footer>
        <?php require_once("footer.php")?>
    </footer>
</body>

</html>