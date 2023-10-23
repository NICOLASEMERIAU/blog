<?php

namespace Application\Controllers\Listpost;

require_once('src/lib/database.php');
require_once('src/model/post.php');
require_once('src/model/postrepository.php');
require_once('src/model/comment.php');
require_once('src/model/commentrepository.php');

use Application\Lib\Database\Database;
use Application\Model\PostRepository\PostRepository;
use Application\Model\Post\Post;
use Application\Model\CommentRepository\CommentRepository;
use Application\Model\Comment\Comment;

class Listpost
{
    public function execute()
    {

        $connexion = new Database();

        $postRepository = new PostRepository();
        $postRepository->connexion = $connexion;
        $posts = $postRepository->getPosts();

        require('templates/listpost.php');
    }
}
