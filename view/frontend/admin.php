<?php $title = 'Admin'; ?>
<?php ob_start(); ?>

<?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == "1"){?>
<h2 id="createPost">Création de billets :</h2>
<!-- Envois  Du formulaire titre et tinyMCE en BDD Sur clique bouton Valider  -->
<script src="https://cdn.tiny.cloud/1/n11767hjwn9rpu0tdqxd0ul2yyve71z7k5rakdrdv0ldvjmc/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<form action="index.php?action=addPost" method="post" id="formAdmin">
    <input type="text" name="titlePost" id="titlePost" placeholder="  Titre">
    <textarea name="tinymce" id="tinymce" placeholder="Bienvenue sur TinyMCE!"></textarea>
    <script>
    tinymce.init({
        forced_root_block: false,
        language: "fr_FR",
        selector: '#tinymce',
        menubar: false,
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | preview print | insertfile image media link anchor',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
    </script>
    <input type="submit" value="Valider" class="formPoster">
    <input type="button" value="Annuler" class="formPoster">
</form>
<!-- 
// Partie Titre post

//afficher les titres des chapitres avec les petit boutons 
//$posts -->
<h2 id="titleOfPost">Titres des billets :</h2>
<?php 
    while($posts = $postsLister->fetch()){
  ?>
<div id="group_post">
    <p id="titlePostOnAdmin">
        <?php echo htmlspecialchars($posts['title']) ?></p>
    <!--bouton modifier redirige vers une page à part lorsque validé récuprère le post pour en faire un UPDATE -->
    <a id="modifyAll" href="index.php?action=modifyPoster&amp;idPost=<?=$posts['id_post']?>"><i
            class="fas fa-edit"></i></a>
    <a id="idsupprPost" href="index.php?action=supprPost&amp;idPost=<?=$posts['id_post']?>"><i
            class="fas fa-trash-alt"></i></a>
</div>
<div id="separate"></div>
<?php 
  } 
  ?>
<!-- // Partie Commentaire Signalé

//afficher les commentaires avec les différents boutons modifier et supprimer $reportonAdmin
// Pour les différents bouton la corbeille pour annuler (<i class="fas fa-trash-alt"></i>) et pour modifier le texte (<i class="fas fa-edit"></i>) -->
<h2 id="TitleCommentOnAdmin">Commentaires signalés :</h2>
<?php
  while ($report = $reportonAdmin->fetch()){
     ?>
<p id="CommentOnAdmin"><strong>
        <?= $report["pseudo"]; ?>
    </strong>
    <a id="idunReport"
        href="index.php?action=unreport&idComment=<?= $report["comment_id"]?>&idPost=<?= $report['id_post'] ?>"><i
            class="fas fa-check-square"></i></a>
    <!-- à modif -->
    <a id="idsupprComment"
        href="index.php?action=suppprComment&idComment=<?= $report["comment_id"]?>&idPost=<?= $report['id_post'] ?>"><i
            class="fas fa-trash-alt"></i></a>
</p>
<p id="CommentTextOnAdmin"><?= nl2br(htmlspecialchars($report['comment_text']))?></p>
<?php } ?>
<?php } ?>

<?php $content = ob_get_clean();?>
<?php require_once("view/frontend/template.php")?>