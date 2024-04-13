<?php $title = "Connexion / Inscription"; ?>

<?php ob_start(); ?>
    <section id="portfolio">
        <div class="container">

            <div class="col-lg-12 text-center">
                <?php
                if(isset($_SESSION["registration"]))
                {
                    echo "Votre compte est créé. Veuillez désormais vous connecter pour commencer votre visite du blog";
                }
                ?>

                <form action="index.php?action=connect" method="POST">
                    <h4>Connexion</h4>
                    <div class="mb-3">
                        <label for="mail" class="form-label">Adresse mail</label>
                        <input type="email" class="form-control" name="mail" id="mail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre adresse mail avec quiconque. </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </form>

                <br /><br /><br /><br />
                <?php
                if(!isset($_SESSION["registration"]))
                {
                    ?>

                    <form action="index.php?action=register" method="POST">
                        <h4>Inscription</h4>
                        <div class="mb-3">
                            <label for="firstname" class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="firstname" id="firstname">

                            <label for="lastname" class="form-label">Nom de famille</label>
                            <input type="text" class="form-control" name="lastname" id="lastname">

                            <label for="mail" class="form-label">Adresse mail</label>
                            <input type="email" class="form-control" name="mail" id="mail" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre adresse mail avec quiconque. </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </form>


                    <?php
                }
                ?>
            </div>
        </div>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>