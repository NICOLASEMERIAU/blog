<?php

namespace Application\Controllers\AdminDeletePost;

require_once('src/lib/database.php');
require_once('src/model/post.php');
require_once('src/model/postRepository.php');

use Application\Lib\Database\Database;
use Application\Model\Post\Post;
use Application\Model\PostRepository\PostRepository;

class AdminDeletePost
{
    public function execute(string $identifier): mixed
    {
        $postRepository = new PostRepository();
        $postRepository->connexion = new Database();
        $success = $postRepository->deletePost($identifier);
        if (!$success) {
            throw new \Exception('Impossible de supprimer le post!');
        } else {
            header('Location: index.php?action=admin');
        }
    }
}
