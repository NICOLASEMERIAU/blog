<?php

namespace Application\Controllers\Comment\Update;

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/model/commentRepository.php');

use Application\Lib\Database\Database;
use Application\Model\Comment\Comment;
use Application\Model\CommentRepository\CommentRepository;

class UpdateComment
{
    public function execute(string $identifier, ?array $input, string $identifierPost) : mixed
    {
        if ($input !== null) {
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
            $success = $commentRepository->updateComment($identifier, $user_id, $comment);
            if (!$success) {
                throw new \Exception('Impossible de modifier le commentaire !');
            } else {
                header('Location: index.php?action=post&post_id=' . $identifierPost);
            }
        }

        // Otherwise, it displays the form.
        $commentRepository = new CommentRepository();
        $commentRepository->connexion = new Database();
        $comment = $commentRepository->getComment($identifier);
        if ($comment === null) {
            throw new \Exception("Le commentaire $identifier n'existe pas.");
        }

        require('templates/post.php');
    }
}
