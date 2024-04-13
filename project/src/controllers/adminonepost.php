<?php

namespace Application\Controllers\AdminOnePost;

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/model/commentRepository.php');
require_once('src/model/post.php');
require_once('src/model/postRepository.php');

use Application\Lib\Database\Database;
use Application\Model\CommentRepository\CommentRepository;
use Application\Model\Comment\Comment;
use Application\Model\PostRepository\PostRepository;
use Application\Model\Post\Post;

class AdminOnePost
{
    public function execute(string $identifier): mixed
    {
        $connexion = new Database();

        $postRepository = new PostRepository();
        $postRepository->connexion = $connexion;
        $post = $postRepository->getPost($identifier);

        $commentRepository = new CommentRepository();
        $commentRepository->connexion = $connexion;
        $comments = $commentRepository->getComments($identifier);

        require('templates/adminonepost.php');
    }
}
