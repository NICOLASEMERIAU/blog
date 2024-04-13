<?php

namespace Application\Controllers\AdminListUnvalidatedComments;

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/model/commentrepository.php');

use Application\Lib\Database\Database;
use Application\Model\Comment\Comment;
use Application\Model\CommentRepository\CommentRepository;

class AdminListUnvalidatedComments
{
    public function execute()
    {

        $commentRepository = new CommentRepository();
        $commentRepository->connexion = new Database();
        $comments= $commentRepository->getUnvalidatedComments();

        require('templates/AdminListUnvalidatedComments.php');

    }
}
