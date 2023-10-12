<?php

require_once('src/controllers/comment/add.php');
require_once('src/controllers/comment/update.php');
require_once('src/controllers/post.php');
require_once('src/controllers/listpost.php');
require_once('src/controllers/homepage.php');
require_once('src/controllers/connect.php');

use Application\Controllers\Comment\Add\AddComment;
use Application\Controllers\Comment\Update\UpdateComment;
use Application\Controllers\Post\Post;
use Application\Controllers\Listpost\Listpost;
use Application\Controllers\Homepage\Homepage;
use Application\Controllers\Connect\Connect;

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'list') {
            (new Listpost())->execute();
        }
        elseif ($_GET['action'] === 'post') {
            if (isset($_GET['post_id']) && $_GET['post_id'] > 0) {
                $identifierPost = $_GET['post_id'];

                (new Post())->execute($identifierPost);
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
        } elseif ($_GET['action'] === 'connect') {
                // It sets the input only when the HTTP method is POST (ie. the form is submitted).
                $input = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input = $_POST;
                    (new Connect())->execute($input);
                }
                else {
                throw new Exception('Aucune connexion demandée');
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
