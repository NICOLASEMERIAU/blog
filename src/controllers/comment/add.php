<?php

namespace Application\Controllers\Comment\Add;

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/model/commentrepository.php');

use Application\Lib\Database\Database;
use Application\Model\Comment\Comment;
use Application\Model\CommentRepository\CommentRepository;

class AddComment
{
    public function execute(string $post, array $input)
    {
        $user_id = null;
        $comment = null;
        if (!empty($input['user_id']) && !empty($input['comment'])) {
            $user_id = $input['user_id'];
            $comment = $input['comment'];
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $commentRepository = new CommentRepository();
        $commentRepository->connexion = new Database();
        $success = $commentRepository->createComment($post, $user_id, $comment);
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&post_id=' . $post);
        }
    }
}
