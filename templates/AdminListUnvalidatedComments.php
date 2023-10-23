<?php
$title = "Administration"; ?>

<?php ob_start(); ?>
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Bienvenue à l'admin 
                    <?php
                    if (isset($_SESSION["firstname"]))
                    {
                        echo $_SESSION["firstname"];
                    }    ?>

                    </h2>
                    <hr class="star-primary">
                </div>
            </div>
            <?php
            if(empty($comments)){
                echo "Aucun commentaire à valider";
            }
            foreach ($comments as $comment) {
            ?>
            <p><strong><?= htmlspecialchars($comment->firstname) ?></strong> le <?= $comment->frenchCreationDate ?> 
            (<a href="index.php?action=adminvalidatecomment&comment_id=<?= $comment->identifier ?>&post_id=<?= $comment->post ?>">Valider</a>)</p>
            (<a href="index.php?action=adminonepost&post_id=<?= $comment->post ?>">Voir le post</a>)</p>
            <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
            <?php
            }
            ?>  
       </div>
    </section>

<?php 
$content = ob_get_clean(); ?>

<?php require('adminlayout.php') ?>
