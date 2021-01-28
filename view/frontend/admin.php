<?php $title = 'Admin'; ?>
<?php ob_start(); ?>

<?php if($_SESSION['admin'] == "1"){?>
  <?php
  //Envois  Du formulaire titre et tinyMCE en BDD Sur clique bouton Valider 
  ?>
  <script src="https://cdn.tiny.cloud/1/n11767hjwn9rpu0tdqxd0ul2yyve71z7k5rakdrdv0ldvjmc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <form action="index.php?action=addPost"> 
<input type="text" id="titlePost" placeholder="Titre">
<textarea id="tinymce" placeholder="Welcome to TinyMCE!"></textarea>
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
  <input type="button" value="Valider">
  <input type="button" value="Annuler">
  </form>
  <!-- Problème avec postView.php  soit je le met il m'affiche que $post et $comment sont Undefined  soit je le met pas et remplace 
       garde template.php mais il me retourne que $content est Undefined 
  -->

  <!-- 
// Partie Titre post

//afficher les titres des chapitres avec les petit boutons 
//$posts -->
 <?php 
while($posts = $postsLister->fetch()){
?>
<?=
  htmlspecialchars($posts['title']) ?>
<?php
}
?>
 <?php
 // Partie Commentaire Signalé
 
 //afficher les commentaires avec les différents boutons modifier et supprimer $reportonAdmin
 // Pour les différents bouton la corbeille pour annuler (<i class="fas fa-trash-alt"></i>) et pour modifier le texte (<i class="fas fa-edit"></i>)

   while ($report = $reportonAdmin->fetch()){?>
     <p><strong> <?=
     $report["comment_text"];
     ?></strong>
     </strong>
     <!-- ceci en est la cause, il n'appel rien et n'est  appelé par rien -->
     <a  id="idReport" href="index.php?action=report&idComment=<?= $report["comment_id"]?>&idPost=<?= $report['id_post'] ?>"><i class="far fa-flag"></i></a></p>
   <?php
     }
   ?>
     <p><?= nl2br(htmlspecialchars($report['comment_text'])) ?></p>
<?php
}
?> 

<?php $content = ob_get_clean();
?>
<?php require_once("view/frontend/template.php") ?>