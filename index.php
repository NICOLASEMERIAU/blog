<?php
session_start();

require_once('src/controllers/comment/add.php');
require_once('src/controllers/comment/update.php');
require_once('src/controllers/onepost.php');
require_once('src/controllers/adminonepost.php');
require_once('src/controllers/listpost.php');
require_once('src/controllers/adminlistpost.php');
require_once('src/controllers/adminupdatepost.php');
require_once('src/controllers/admincreatepost.php');
require_once('src/controllers/admindeletepost.php');
require_once('src/controllers/adminvalidatecomment.php');
require_once('src/controllers/adminlistusers.php');
require_once('src/controllers/adminmodifyuser.php');
require_once('src/controllers/homepage.php');
require_once('src/controllers/connexion.php');
require_once('src/controllers/useradd.php');

use Application\Controllers\Comment\Add\AddComment;
use Application\Controllers\Comment\Update\UpdateComment;
use Application\Controllers\OnePost\OnePost;
use Application\Controllers\AdminOnePost\AdminOnePost;
use Application\Controllers\Listpost\Listpost;
use Application\Controllers\AdminListpost\AdminListpost;
use Application\Controllers\AdminUpdatepost\AdminUpdatepost;
use Application\Controllers\AdminCreatepost\AdminCreatepost;
use Application\Controllers\AdminDeletepost\AdminDeletepost;
use Application\Controllers\AdminValidateComment\AdminValidateComment;
use Application\Controllers\AdminListUsers\AdminListUsers;
use Application\Controllers\AdminModifyUser\AdminModifyUser;
use Application\Controllers\Homepage\Homepage;
use Application\Controllers\Connexion\Connexion;
use Application\Controllers\UserAdd\UserAdd;

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'list') {
            (new Listpost())->execute();
        }
        elseif ($_GET['action'] === 'post') {
            if (isset($_GET['post_id']) && $_GET['post_id'] > 0) {
                $identifierPost = $_GET['post_id'];

                (new OnePost())->execute($identifierPost);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');  //ça n'apparait pas quand il y a une erreur!!!!!!!!!!!!!!!!
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['post_id']) && $_GET['post_id'] > 0) {
                $identifierPost = $_GET['post_id'];

                (new AddComment())->execute($identifierPost, $_POST);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'updateComment') {
            if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0 && isset($_GET['post_id']) && $_GET['post_id'] > 0) {
                $identifierComment = $_GET['comment_id'];
                $identifierPost = $_GET['post_id'];                
                // It sets the input only when the HTTP method is POST (ie. the form is submitted).
                $input = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input = $_POST;
                }

                (new UpdateComment())->execute($identifierComment, $input, $identifierPost);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        } elseif ($_GET['action'] === 'connexionpage') {
            require('templates/connexionpage.php');

        } elseif ($_GET['action'] === 'admin') {
            if ($_SESSION['role_id'] > '1') {
                (new AdminListpost())->execute();
            }
            else {
            throw new Exception('Impossible de vous connecter à l\'espace administration. Vous n\'avez pas les autorisations.');
            }

        } elseif ($_GET['action'] === 'adminonepost') {
            if ($_SESSION['role_id'] > '1') {
                if (isset($_GET['post_id']) && $_GET['post_id'] > 0) {
                    $identifierPost = $_GET['post_id'];
    
                    (new AdminOnePost())->execute($identifierPost);
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');  //ça n'apparait pas quand il y a une erreur!!!!!!!!!!!!!!!!
                }
                }
            else {
            throw new Exception('Impossible de vous connecter à l\'espace administration. Vous n\'avez pas les autorisations.');
            }

        } elseif ($_GET['action'] === 'adminvalidatecomment') {
            if ($_SESSION['role_id'] > '1') 
            {
                if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0 && isset($_GET['post_id']) && $_GET['post_id'] > 0) {
                    $identifierComment = $_GET['comment_id'];
                    $identifierPost = $_GET['post_id'];                   
                    (new AdminValidateComment())->execute($identifierComment, $identifierPost);
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé pour la validation');
                }
            }
            else {
            throw new Exception('Impossible de vous connecter à l\'espace administration. Vous n\'avez pas les autorisations.');
            }

        } elseif ($_GET['action'] === 'admindeletepost') {
            if ($_SESSION['role_id'] === '3') 
            {
                if (isset($_GET['post_id']) && $_GET['post_id'] > 0) {
                    $identifierPost = $_GET['post_id'];                   
                    (new AdminDeletePost())->execute($identifierPost);
                } else {
                    throw new Exception('Aucun identifiant de post envoyé pour la suppression');
                }
            }
            else {
            throw new Exception('Impossible de vous connecter à l\'espace administration. Vous n\'avez pas les autorisations.');
            }

        } elseif ($_GET['action'] === 'adminupdatepost') {
            if ($_SESSION['role_id'] === '3') 
            {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    (new AdminUpdatePost())->execute($_POST);
                }
                else {
                    throw new Exception('Pas de post reçu...');
                    }       
            }
            else {
            throw new Exception('Impossible de vous connecter à l\'espace administration. Vous n\'avez pas les autorisations.');
            }

        } elseif ($_GET['action'] === 'admincreatepost') {
            if ($_SESSION['role_id'] === '3') 
            {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    (new AdminCreatePost())->execute($_POST);
                }
                else {
                    throw new Exception('Pas de post reçu...');
                    }       
            }
            else {
            throw new Exception('Impossible de vous connecter à l\'espace administration. Vous n\'avez pas les autorisations.');
            }

        } elseif ($_GET['action'] === 'adminmodifyuser') {
            if ($_SESSION['role_id'] === '3') 
            {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    (new AdminModifyUser())->execute($_POST);
                }
                else {
                    throw new Exception('Pas de post reçu...');
                    }       
            }
            else {
            throw new Exception('Impossible de vous connecter à l\'espace administration. Vous n\'avez pas les autorisations.');
            }

        } elseif ($_GET['action'] === 'adminlistuser') {
            if ($_SESSION['role_id'] === '3') 
            {
                (new AdminListUsers())->execute();
            }
            else {
            throw new Exception('Impossible de vous connecter à l\'espace administration. Vous n\'avez pas les autorisations.');
            }

        } elseif ($_GET['action'] === 'connect') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                (new Connexion())->execute($_POST);
            }
            else {
            throw new Exception('Aucune connexion demandée');
            }
        } elseif ($_GET['action'] === 'disconnect') {
            session_destroy();
            header('Location: index.php');        
        } elseif ($_GET['action'] === 'register') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                (new UserAdd())->execute($_POST);
            }
            else {
            throw new Exception('Impossible de vous enregistrer. Merci de réessayer.');
            }
        } else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        (new Homepage())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}
