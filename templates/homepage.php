<?php ob_start(); 
$title= "Accueil";?>
<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name">Nicolas Emeriau pour Toolsvet</span>
                        <hr class="star-light">
                        <span class="skills">Développeur Web dans le domaine de la gestion des cliniques vétérinaires</span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Qui suis-je?</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>J'ai créé Toolsvet afin d'aider tous les gestionnaires de site vétérinaire dans leurs tâches RH</p>
                </div>
                <div class="col-lg-4">
                    <p>Voici quelques-unes de nos applications web : petites annonces stages, CDD et CDI, accompagnement à l'embauche, prévention des risques</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="img/cv_emeriau.pdf" class="btn btn-lg btn-outline btn-success">
                        <i class="fa fa-download"></i> Télécharger mon CV
                    </a>
                </div>
            </div>
        </div>
    </section>


        <!-- Blog Grid Section -->
        <section class="success" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Accès au blog</h2>
                    <hr class="star-light">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <a href="index.php?action=list" class="btn btn-lg btn-outline"> Simple visite  </a>
                     </div>
                     <div class="col-lg-8 col-lg-offset-2 text-center">
                        <a href="#connexion" class="btn btn-lg btn-outline" data-toggle="modal"> Se connecter  </a>
                     </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contactez moi</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nom</label>
                                <input type="text" class="form-control" placeholder="Nom" id="name" required data-validation-required-message="Vous pouvez écrire votre nom ici.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Adresse mail</label>
                                <input type="email" class="form-control" placeholder="Adresse mail" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Numéro de téléphone</label>
                                <input type="tel" class="form-control" placeholder="Numéro de téléphone" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

        <!-- Connexion Modals -->
        <div class="portfolio-modal modal fade" id="connexion" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <br /><br /><br /><br /><h4>    
                                Inscription
                            </h4>
                        <form action="index.php?action=register" method="post">
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
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

    <?php $content = ob_get_clean(); ?>

    <?php require('layout.php') ?>
