<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="public/CSS/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <script src="https://cdn.tiny.cloud/1/n11767hjwn9rpu0tdqxd0ul2yyve71z7k5rakdrdv0ldvjmc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    </head> 
    <body>
        <?php require("menu.php")?>
        <textarea id="tinymce">
    Welcome to TinyMCE!
  </textarea>
  <script>
    tinymce.init({
      selector: 'textarea',
      menubar: false,
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>
        <?= $content ?>
    </body>
    <footer>
    <?php require("footer.php")?>  
    </footer>
</html>