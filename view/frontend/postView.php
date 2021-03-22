<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<h1 class="lastPoster">Derniers billets du blog :</h1>
<a href="index.php" id="return-ticket-list">Retour à la liste des billets</a>

<div class="news">
    <p id="titlePostOnComment">
        <?= htmlspecialchars($post['title']) ?>
        <em class="datepost">le <?= $post['date_post_fr'] ?></em>
    </p>

    <div id="textPostOnComment">
        <?= nl2br($post['text_post']) ?>
    </div>
</div>

<h2 id="labelComment">Commentaires</h2>
<?php 
        if(isset ($_SESSION['id'])){
        ?>
<form action="index.php?action=addComment&amp;id=<?= $post['id_post'] ?>" method="post">
    <div>
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" id="submitComment">
    </div>
</form>

<?php
        }
        ?>

<div id="group_comment">
    <?php
        while ($comment = $comments->fetch())
        {
        ?>
    <p id="pseudoComment"><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> <em class="datepost">le
            <?= $comment['comment_date_fr'] ?></em>
        <?php
            if(isset($_SESSION['id'])){?>
        <!-- ceci en est la cause, il n'appel rien et n'est  appelé par rien -->
        <a id="idReport"
            href="index.php?action=report&idComment=<?= $comment["comment_id"]?>&idPost=<?= $comment['id_post'] ?>"><i
                class="far fa-flag"></i></a>
    </p>
    <?php
            }
            ?>
    <p class="comment_text"><?= nl2br(htmlspecialchars($comment['comment_text'])) ?></p>
    <?php
        }
        ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require_once('view/frontend/template.php'); ?>