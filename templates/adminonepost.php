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
                   <?php         
                     if ($_SESSION['role_id'] === '3') 
                      {   
                        ?>
                            <h4>    
                            <a href="index.php?action=admindeletepost&post_id=<?= $post->identifier ?>">Supprimer le post</a>
                            </h4>
                            <h4>    
                                Modifier le post:
                            </h4>
                            <form action="index.php?action=adminupdatepost" method="post">
                            <input id="post_id" name="post_id" type="hidden" value=<?= $post->identifier?>>
                            <div class="mb-3">
                              <label for="title" class="form-label">Titre</label><br />
                              <textarea id="title" name="title" class="form-control"><?= htmlspecialchars($post->title) ?></textarea>
                           </div>
                           <div class="mb-3">
                           <label for="img" class="form-label">Choix de l'image</label><br />
                            <select class="form-select" name="img" size="6">
                            <option value="cake.png" <?php if ($post->image === "cake.png"){echo 'selected';} ?>>cake</option>
                            <option value="cabin.png" <?php if ($post->image === "cabin.png"){echo 'selected';} ?>>cabin</option>
                            <option value="circus.png" <?php if ($post->image === "circus.png"){echo 'selected';} ?>>circus</option>
                            <option value="game.png" <?php if ($post->image === "game.png"){echo 'selected';} ?>>game</option>
                            <option value="safe.png" <?php if ($post->image === "safe.png"){echo 'selected';} ?>>safe</option>
                            <option value="submarine.png" <?php if ($post->image === "submarine.png"){echo 'selected';} ?>>submarine</option>
                            </select>
                                </div>
                           <div class="mb-3">
                              <label for="chapo" class="form-label">En bref</label><br />
                              <textarea id="chapo" name="chapo" class="form-control"><?= htmlspecialchars($post->chapo) ?></textarea>
                           </div>
                           <div class="mb-3">
                              <label for="content" class="form-label">Contenu du post</label><br />
                              <textarea id="content" name="content" class="form-control"><?= htmlspecialchars($post->content) ?></textarea>
                           </div>
                           <div class="mb-3">
                           <button type="submit" class="btn btn-primary">Modifier</button>
                           </div>
                        </form>

                <?php
                      }
                else
                {
                    ?>
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
                <?php
                }
                ?>

                            <h4>    
                                Commentaires:
                            </h4>
                            <?php
                            foreach ($comments as $comment) {
                                ?>
                                <p><strong><?= htmlspecialchars($comment->firstname) ?></strong> le <?= $comment->frenchCreationDate ?> 
                                <?php
                                if ($comment->validation === "non")
                                {
                                    ?>
                                    (<a href="index.php?action=adminvalidatecomment&comment_id=<?= $comment->identifier ?>&post_id=<?= $comment->post ?>">Valider</a>)</p>
                                <?php
                                }
                                ?>  
                                <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
                            <?php
                            }
                            ?>  
                </div>
            </div>
       </div>
    </section>


<p><a href="index.php?action=admin">Retour à la liste des billets</a></p>

<?php $content = ob_get_clean(); ?>

<?php require('adminlayout.php') ?>

