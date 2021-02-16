<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<img src="public/img/Forests_Mountains_Rivers_USA_Alaska_568452_1920x1080.png" id="alaska-img">
<h1 id="lastPoster">Derniers billets du blog :</h1>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <p id="titleposter">
            
            <?= htmlspecialchars($data['title']) ?>
            <em class="datepost">le <?= $data['date_post_fr'] ?></em>
        </p>
        
        <p class="postscript">
            <?= nl2br(htmlspecialchars($data['text_post'])) ?>
            
        </p>
        <p id="comments"><em><a href="index.php?action=post&amp;id=<?= $data['id_post'] ?>">Commentaires</a></em></p>
        <div id="separate"></div>
    </div>
    <?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>


<?php require_once('view/frontend/template.php'); ?>