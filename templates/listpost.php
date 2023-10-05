<?php $title = "Les posts du blog"; ?>

<?php ob_start(); ?>
<div class="title">
<h1>Le super blog de l'AVBN !</h1>
<p>Derniers billets du blog :</p>
</div>
<?php
foreach ($posts as $post) {
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($post->title); ?>
            <em>le <?= $post->frenchCreationDate; ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($post->content)); ?>
            <br />
            <em><a href="index.php?action=post&id=<?= urlencode($post->identifier) ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
?>
<div class="news">
<h1>Le super blog de l'AVBN !</h1>
<p>Derniers billets du blog :</p>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
