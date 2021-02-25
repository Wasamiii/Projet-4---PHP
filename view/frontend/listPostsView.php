
<?php $title = 'Billet simple pour l\'Alaska'; ?>
<script src="/public/JS/main.js" type="text/javascript"></script>
<?php ob_start(); ?>
<div id="background-parallax"  data-type="background" data-speed="3"></div>
<script src="/public/JS/main.js" type="text/javascript"></script>
<h1 class="lastPoster">Derniers billets du blog :</h1>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <p id="titleposter">
            
            <?= htmlspecialchars($data['title']) ?>
            <em class="datepost">le <?= $data['date_post_fr'] ?></em>
        </p>
        
        <div class="postscript">
            <?= nl2br($data['text_post']) ?>
            
        </div>
        <p id="comments"><em><a href="index.php?action=post&amp;id=<?= $data['id_post'] ?>">Commentaires</a></em></p>
        <div id="separate"></div>
    </div>
    <?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>


<?php require_once('view/frontend/template.php'); ?>