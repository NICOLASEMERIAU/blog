<?php $title = "Le post"; ?>

<?php ob_start(); ?>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?= htmlspecialchars($post->title); ?></h2>
                    <hr class="star-primary">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 portfolio-item">
                        <img src="img/portfolio/<?= $post->image; ?>" class="img-responsive" alt="">
                </div>
                
                <div class="col-sm-8 portfolio-item">
                            <h4>    
                                En bref :
                            </h4>
                            <p>
                                <?= nl2br(htmlspecialchars($post->chapo)); ?>
                            </p>
                            <h4>    
                                Contenu :
                            </h4>
                            <p>
                                <?= nl2br(htmlspecialchars($post->content)); ?>
                            </p>
                            <ul class="list-inline item-details">

                                <li>Date:
                                    <strong>
                                        <?= $post->frenchCreationDate; ?>
                                    </strong>
                                </li>

                            </ul>
                            <h4>    
                                Commentaires:
                            </h4>
                            <?php
                            foreach ($comments as $comment) {
                                if ($comment->validation === "oui")
                                {
                                ?>
                                <p><strong><?= htmlspecialchars($comment->firstname) ?></strong> le <?= $comment->frenchCreationDate ?> 
                                <?php
                            if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] === $comment->user_id)
                                {
                                        ?>
                                    (<a href="#commentModal<?= $comment->identifier ?>" data-toggle="modal">modifier</a>)</p>
                                <?php
                            }
                            ?>  
                                <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
                                <?php
                                }
                                ?>  

                            <?php
                            }
                            ?>  
                                                <?php

                    if (isset($_SESSION["role_id"]) && $_SESSION["role_id"] >0 )
                    {
                         ?>

                            <h4>    
                                Ajouter un commentaire:
                            </h4>
                            <form action="index.php?action=addComment&post_id=<?= $post->identifier ?>" method="post">
                            <input id="user_id" name="user_id" type="hidden" value=<?= $_SESSION["user_id"]?>>

                            <div>
                                <label for="comment">Commentaire</label><br />
                                <textarea id="comment" name="comment"></textarea>
                            </div>
                            <div>
                                <input type="submit" />
                            </div>
                            </form>
                            <?php
                    }        ?>
                </div>
            </div>
       </div>
    </section>

    <?php
    foreach ($comments as $comment) {
    ?>
    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="commentModal<?= $comment->identifier ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                                        <p><strong><?= htmlspecialchars($comment->firstname) ?></strong> le <?= $comment->frenchCreationDate ?> </p>
                                        <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
                            <h4>    
                                Modifier le commentaire:
                            </h4>
                            <form action="index.php?action=updateComment&comment_id=<?= $comment->identifier ?>&post_id=<?= $comment->post ?>" method="post">
                            <input id="user_id" name="user_id" type="hidden" value=<?= $comment->user_id?>>
                           <div>
                              <label for="comment">Commentaire</label><br />
                              <textarea id="comment" name="comment"><?= htmlspecialchars($comment->comment) ?></textarea>
                           </div>
                           <div>
                              <input type="submit" />
                           </div>
                        </form>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
                                }
                            ?>

<p><a href="index.php?action=list">Retour à la liste des billets</a></p>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>

