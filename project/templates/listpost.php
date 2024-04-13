<?php
$title = "Les posts du blog"; ?>

<?php ob_start(); ?>
<!-- Portfolio Grid Section -->
<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Bienvenue
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
        foreach ($posts as $post) {
            ?>
            <div class="row">
                <div class="col-sm-4 portfolio-item">
                    <a href="index.php?action=post&post_id=<?= $post->identifier; ?>" class="portfolio-link">
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
                        <a class="page-link" href="index.php?action=list&page=<?=($page - 1)?>">Précédent</a>
                    </li>
                    <?php
                }
                ?>

                <?php
                $nbPages = ceil($total / $postsPerPage);
                for ($i = 1; $i <= $nbPages; $i++) {
                    ?>
                    <li class="page-item <?php if ($page === $i){echo 'active';}?>">
                        <a class="page-link" href="index.php?action=list&page=<?=$i?>"><?=$i?></a></li>
                    <?php
                }
                ?>
                <?php
                if($page < $nbPages){
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?action=list&page=<?=($page + 1)?>">Suivant</a>
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

<?php require('layout.php') ?>
