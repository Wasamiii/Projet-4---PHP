<?php $title = 'Billet simple pour l\'Alaska'; ?>
<?php ob_start(); ?>
<div id="background-parallax" data-type="background" data-speed="3"></div>
<script src="/public/JS/main.js"></script>
<h1 class="lastPoster">Derniers billets du blog :</h1>


<?php
while ($data = $posts->fetch())
{
?>
<div class="news">
    <p class="titleposter">

        <?= htmlspecialchars($data['title']) ?>
        <em class="datepost">le <?= $data['date_post_fr'] ?></em>
    </p>

    <div class="postscript">
        <?= nl2br($data['text_post']) ?>

    </div>
    <p class="comments"><em><a href="index.php?action=post&amp;id=<?= $data['id_post'] ?>">Commentaires</a></em></p>
    <div class="separate"></div>
</div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>


<?php require_once('view/frontend/template.php'); ?>