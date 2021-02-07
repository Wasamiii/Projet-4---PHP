<?php $title = 'AdminmodPost'; ?>
<?php ob_start(); ?>
<?php if($_SESSION["admin"] == "1"){?>
    <script src="https://cdn.tiny.cloud/1/n11767hjwn9rpu0tdqxd0ul2yyve71z7k5rakdrdv0ldvjmc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <form action="index.php?action=addPost" method="post"> 
<input type="text" name="titlePost" id="titlePost" placeholder="Titre">
<textarea name="tinymce" id="tinymce" placeholder="Welcome to TinyMCE!"></textarea>
  <script>
    tinymce.init({
      selector: '#tinymce',
      menubar: false,
      plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
      toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | preview print | insertfile image media link anchor',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>
  <input type="submit" value="Valider">
  <input type="button" value="Annuler">
  </form>

<?php    
}
?>


<?php $content = ob_get_clean();?>
<?php require_once("view/frontend/template.php") ?>