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
                            <form action="index.php?action=admincreatepost" method="post">
                            <h4>Ajout d'un post</h4>  
                            <input id="user_id" name="user_id" type="hidden" value=<?= $_SESSION["user_id"]?>>
                            <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="img">Choix de l'image</label><br />
                                <select class="form-select" aria-label="Choix image" name="img" >
                                <option value="cake.png" selected>cake</option>
                                <option value="cabin.png">cabin</option>
                                <option value="circus.png">circus</option>
                                <option value="game.png">game</option>
                                <option value="safe.png">safe</option>
                                <option value="submarine.png">submarine</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="chapo" class="form-label">En bref</label>
                                <textarea type="text" class="form-control" name="chapo" id="chapo"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Contenu</label>
                                <textarea type="text" class="form-control" name="content" id="content"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                            <br />

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
            <nav aria-label="...">
                <ul class="pagination">
                    <?php
                    if($page > 1){
                        ?>
                        <li class="page-item">
                    <a class="page-link" href="index.php?action=admin&page=<?=($page - 1)?>">Précédent</a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                    $nbPages = ceil($total / $postsPerPage);
                    for ($i = 1; $i <= $nbPages; $i++) {
                        ?>
                    <li class="page-item <?php if ($page === $i){echo 'active';}?>">
                        <a class="page-link" href="index.php?action=admin&page=<?=$i?>"><?=$i?></a></li>
                    <?php
                    }
                    ?>
                    <?php
                    if($page < $nbPages){
                        ?>
                        <li class="page-item">
                    <a class="page-link" href="index.php?action=admin&page=<?=($page + 1)?>">Suivant</a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>


       </div>
    </section>

<?php 
$content = ob_get_clean(); ?>

<?php require('adminlayout.php') ?>
