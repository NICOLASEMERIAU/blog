<?php

namespace Application\Controllers\AdminListPost;

require_once('src/lib/database.php');
require_once('src/model/post.php');
require_once('src/model/postRepository.php');

use Application\Lib\Database\Database;
use Application\Model\PostRepository\PostRepository;
use Application\Model\Post\Post;

class AdminListpost
{
    public function execute(int $page): mixed
    {
        $postsPerPage = PostRepository::POSTS_PER_PAGE;
        $connexion = new Database();

        $postRepository = new PostRepository();
        $postRepository->connexion = $connexion;
        $posts = $postRepository->getPosts($page);
        $total = $postRepository->countTotal();

        require('templates/adminlistpost.php');
    }

}
