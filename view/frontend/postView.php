<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['date_post_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['text_post'])) ?>
            </p>
        </div>

        <h2>Commentaires</h2>
        <?php 
        if(isset ($_SESSION['id'])){
           ?> 
           <form action="index.php?action=addComment&amp;id=<?= $post['id_post'] ?>" method="post">
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment"></textarea>
                </div>
                <div>
                    <input type="submit">
                </div>
            </form>

            <?php

            }
            ?>
        

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['comment_date_fr'] ?>
            <?php
            if(isset($_SESSION['id'])){?>
            (<a href="" id="report">Signaler</a>)</p>
        <?php
        }
        ?>
            <p><?= nl2br(htmlspecialchars($comment['comment_text'])) ?></p>
        <?php
        }
        ?>
<?php $content = ob_get_clean(); ?>
<?php require_once('view/frontend/template.php'); ?>