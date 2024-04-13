<?php

namespace Application\Controllers\AdminValidateComment;

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/model/commentrepository.php');

use Application\Lib\Database\Database;
use Application\Model\Comment\Comment;
use Application\Model\CommentRepository\CommentRepository;

class AdminValidateComment
{
    public function execute(string $identifier, string $identifierPost)
    {

        $commentRepository = new CommentRepository();
        $commentRepository->connexion = new Database();
        $commentRepository->validateComment($identifier);

        header('Location: index.php?action=adminonepost&post_id='.$identifierPost.'');

    }
}
