<?php $title = "Page d'erreur"; ?>

<?php ob_start(); ?>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<h1>Erreur</h1>
<p>Une erreur est survenue : <?= $errorMessage ?></p>
<a href="index.php">Retour à la page d'accueil</a>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
