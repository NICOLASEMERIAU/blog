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
                        foreach ($users as $user) {
                                ?>
                        <form action="index.php?action=adminmodifyuser" method="post" >
                                <p><strong><?= htmlspecialchars($user->firstname) ?> <?= htmlspecialchars($user->lastname) ?></strong> 
                                <div class="mb-3">
                            <input id="user_id" name="user_id" type="hidden" value=<?= $user->identifier?>>
                           <label for="role" class="form-label">Rôle de l'utilisateur</label><br />
                            <select class="form-select" name="role" size="3">
                            <option value="1" <?php if ($user->role_id === "1"){echo 'selected';} ?>>Visiteur</option>
                            <option value="2" <?php if ($user->role_id === "2"){echo 'selected';} ?>>Auditeur</option>
                            <option value="3" <?php if ($user->role_id === "3"){echo 'selected';} ?>>Administrateur</option>
                            </select>
                                </div>
                                <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                           </div>
                        </form> <br /><br /><br />

                                <?php
                                }
                                ?>  
       </div>
    </section>

<?php 
$content = ob_get_clean(); ?>

<?php require('adminlayout.php') ?>
