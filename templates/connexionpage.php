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
                            <div>

                            <label><b>Mail</b></label>
                            <input type="text" placeholder="Entrer votre mail" name="mail" required>
                            </div>

                            <div>

                            <label><b>Mot de passe</b></label>
                            <input type="password" placeholder="Entrer votre mot de passe" name="password" required>
                            </div>

                            <input type="submit" id='submit' value='LOGIN' >
                        </form>
                            <br /><br /><br /><br />
                            <?php
                            if(!isset($_SESSION["registration"]))
                            {
                                        ?>
                                    <h4>    
                                        Inscription
                                    </h4>
                                <form action="index.php?action=register" method="post">
                                    <div>
                                    <label for="firstname">Prénom</label><br />
                                    <input type="text" placeholder="Entrer votre prénom" id="firstname" name="firstname" required/>
                                </div>
                                <div>
                                    <label for="lastname">Nom</label><br />
                                    <input type="text" placeholder="Entrer votre nom" id="lastname" name="lastname" required/>
                                </div>
                                <div>
                                    <label for="mail">Adresse mail</label><br />
                                    <input type="text" placeholder="Entrer votre mail" id="mail" name="mail" required/>
                                </div>
                                <div>
                                    <label for="password">Mot de passe</label><br />
                                    <input type="text" placeholder="Entrer votre mot de passe" id="password" name="password" required/>
                                </div>
                                <div>
                                    <input type="submit" />
                                </div>
                                </form>
                                <?php
                            }
                            ?>
                    </div>  
                </div>  
</section>                         
                        
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>