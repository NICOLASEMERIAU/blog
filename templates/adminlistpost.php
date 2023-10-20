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
            if (isset($_SESSION['role_id']) && $_SESSION['role_id'] === "3")
            {?>
                                        <h4>    
                                Ajouter un post:
                            </h4>
                            <form action="index.php?action=admincreatepost" method="post">
                            <input id="user_id" name="user_id" type="hidden" value=<?= $_SESSION["user_id"]?>>

                            <div>
                                <label for="title">Titre</label><br />
                                <textarea id="title" name="title" required></textarea>
                            </div>
                            <div>
                           <label for="img">Choix de l'image</label><br />
                            <select name="img" size="6">
                            <option value="cake.png" selected>cake</option>
                            <option value="cabin.png">cabin</option>
                            <option value="circus.png">circus</option>
                            <option value="game.png">game</option>
                            <option value="safe.png">safe</option>
                            <option value="submarine.png">submarine</option>
                            </select>
                                </div>
                            <div>
                                <label for="chapo">En bref</label><br />
                                <textarea id="chapo" name="chapo" required></textarea>
                            </div>
                            <div>
                                <label for="content">Contenu</label><br />
                                <textarea id="content" name="content" required></textarea>
                            </div>
                            <div>
                                <input type="submit" />
                            </div>
                            </form>
                <?php
                }
            
            foreach ($posts as $post) {
            ?>
            <div class="row">
                <div class="col-sm-4 portfolio-item">
                    <a href="index.php?action=adminonepost&post_id=<?= $post->identifier; ?>" class="portfolio-link">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/<?= $post->image; ?>" class="img-responsive" alt="">
                    </a>
                </div>
                
                <div class="col-sm-8 portfolio-item">
                <h2>
                    <?= htmlspecialchars($post->title); ?>
                </h2>

                <p>
                    <?= nl2br(htmlspecialchars($post->chapo)); ?>
                </p>

                <?= $post->frenchCreationDate; ?>
                </div>
            </div>
            <?php
            }
            ?>
       </div>
    </section>

<?php 
$content = ob_get_clean(); ?>

<?php require('adminlayout.php') ?>
