<!--
/**
 * ! Problème undefined var $content 
 * TODO si ajouté dans template.php une var admin de la même façon que postView.php cela retourne même problèque que çi-dessus + undefined var $admin dans template.php
 */
 -->
<?= require_once("view/frontend/template.php") ?>
<head>
<script src="https://cdn.tiny.cloud/1/n11767hjwn9rpu0tdqxd0ul2yyve71z7k5rakdrdv0ldvjmc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> 
<link rel="stylesheet" href="public/CSS/style.css">
</head>
     
<?php if($_SESSION['admin'] == 1){ ?>
<textarea id="tinymce" placeholder="Welcome to TinyMCE!"></textarea>
  <script>
    tinymce.init({
      selector: '#tinymce',
      menubar: false,
      plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
      toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | preview save print | insertfile image media link anchor | ltr rtl',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>
<?php
}
  ?>