<?php

namespace Application\Controllers\Listpost;

require_once('src/lib/database.php');
require_once('src/model/post.php');
require_once('src/model/comment.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Post\PostRepository;
use Application\Model\Comment\CommentRepository;

class Listpost
{
    public function execute()
    {

        $connection = new DatabaseConnection();

        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $posts = $postRepository->getPosts();

        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;
        $comments = $commentRepository->getCommentsMultipleArticles();

        require('templates/listpost.php');
    }
}
