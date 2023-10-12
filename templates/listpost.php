<?php $title = "Les posts du blog"; ?>

<?php ob_start(); ?>
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Blog</h2>
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
       </div>
    </section>

<?php 
var_dump($connect);
$content = ob_get_clean(); ?>

<?php require('layout.php') ?>
