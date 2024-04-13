<?php

namespace Application\Controllers\AdminCreatePost;

require_once('src/lib/database.php');
require_once('src/model/post.php');
require_once('src/model/postrepository.php');

use Application\Lib\Database\Database;
use Application\Model\Post\Post;
use Application\Model\PostRepository\PostRepository;

class AdminCreatePost
{
    public function execute(array $input)
    {
        $user_id = null;
        $content = null;
        $img = null;
        $title = null;
        $chapo = null;
        if (!empty($input['user_id']) && !empty($input['content']) && !empty($input['chapo']) && !empty($input['title']) && !empty($input['img'])) {
            $user_id = $input['user_id'];
            $content = $input['content'];
            $img = $input['img'];
            $title = $input['title'];
            $chapo = $input['chapo'];
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $postRepository = new PostRepository();
        $postRepository->connexion = new Database();
        $success = $postRepository->createPost($user_id, $content, $chapo, $img, $title);
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter le post !');
        } else {
            header('Location: index.php?action=admin');
        }
    }
}
