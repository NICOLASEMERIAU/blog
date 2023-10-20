<?php

namespace Application\Controllers\AdminListPost;

require_once('src/lib/database.php');
require_once('src/model/post.php');
require_once('src/model/postrepository.php');

use Application\Lib\Database\Database;
use Application\Model\PostRepository\PostRepository;
use Application\Model\Post\Post;

class AdminListpost
{
    public function execute()
    {

        $connexion = new Database();

        $postRepository = new PostRepository();
        $postRepository->connexion = $connexion;
        $posts = $postRepository->getPosts();

        require('templates/adminlistpost.php');
    }
}
