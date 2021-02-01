<?php $title = 'Admin'; ?>
<?php ob_start(); ?>

<?php if($_SESSION['admin'] == "1"){?>

  <!-- Envois  Du formulaire titre et tinyMCE en BDD Sur clique bouton Valider  -->
  
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
  <!-- 
// Partie Titre post

//afficher les titres des chapitres avec les petit boutons 
//$posts -->
 <?php 
while($posts = $postsLister->fetch()){
?>
<strong>
<?=
  htmlspecialchars($posts['title']) ?>
  <!--bouton modifier redirige vers une page à part lorsque validé récuprère le post pour en faire un UPDATE -->
  <i class="fas fa-edit"></i>
  <!-- //à modif -->
  <a id="idsupprPost" href="index.php?action=supprPost&amp;<?=$posts['id_post']?>"><i class="fas fa-trash-alt"></i></a>
</strong>
<?php } ?> 
 <?php
 // Partie Commentaire Signalé
 
 //afficher les commentaires avec les différents boutons modifier et supprimer $reportonAdmin
 // Pour les différents bouton la corbeille pour annuler (<i class="fas fa-trash-alt"></i>) et pour modifier le texte (<i class="fas fa-edit"></i>)

   while ($report = $reportonAdmin->fetch()){
     ?>
     <p><strong>
      <?= $report["pseudo"]; ?>
     </strong>
    <a id="idunReport" href="index.php?action=unreport&idComment=<?= $report["comment_id"]?>&idPost=<?= $report['id_post'] ?>"><i class="fas fa-check-square"></i></a>
    <!-- à modif -->
    <a id="idsupprComment" href="index.php?action=supprComment&idComment=<?= $report["comment_id"]?>&idPost=<?= $report['id_post'] ?>"><i class="fas fa-trash-alt"></i></a></p>
     <p><?= nl2br(htmlspecialchars($report['comment_text']))?></p>
     <?php } ?> 
<?php } ?> 

<?php $content = ob_get_clean();?>
<?php require_once("view/frontend/template.php") ?>