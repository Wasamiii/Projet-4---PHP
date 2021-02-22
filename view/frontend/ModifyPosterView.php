<?php $title = 'AdminmodPost';?>
<?php ob_start();?>
<?php if($_SESSION["admin"] == "1"){?>
<script src="https://cdn.tiny.cloud/1/n11767hjwn9rpu0tdqxd0ul2yyve71z7k5rakdrdv0ldvjmc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<form action="index.php?action=modifyPosting&idPost=<?= $post['id_post'] ?>" method="post" id="formModify"> 
  <input type="text" name="modtitlePost" id="modtitlePost" placeholder="Titre" required>
  <textarea name="tinymcemod" id="tinymcemod" placeholder="Welcome to TinyMCE!" required></textarea>
    <script>
    tinymce.init({
        forced_root_block : false,
        language : "fr_FR",
        selector: 'textarea#tinymcemod',
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
<?php    
}
?>
<div class="news">
            <h3 id="modifyTitle">
                <?= htmlspecialchars($post['title']) ?>
                <em id="modifyDate">le <?= $post['date_post_fr'] ?></em>
            </h3>
            
            <div id="modifyText">
                <?= nl2br($post['text_post']) ?>
            </div>
        </div>

<?php $content = ob_get_clean();?>
<?php require_once("view/frontend/template.php")?>