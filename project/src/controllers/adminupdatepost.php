<?php

namespace Application\Controllers\AdminUpdatePost;

require_once('src/lib/database.php');
require_once('src/model/post.php');
require_once('src/model/postRepository.php');

use Application\Lib\Database\Database;
use Application\Model\Post\Post;
use Application\Model\PostRepository\PostRepository;

class AdminUpdatePost
{
    public function execute(?array $input)
    {
        if ($input !== null)
        {
            if (!empty($input['post_id']) && !empty($input['content']) && !empty($input['title']) && !empty($input['chapo']) && !empty($input['img'])) {
                $post_id = $input['post_id'];
                $content = $input['content'];
                $title = $input['title'];
                $chapo = $input['chapo'];
                $img = $input['img'];
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }

            $postRepository = new PostRepository();
            $postRepository->connexion = new Database();
            $success = $postRepository->updatePost($post_id, $content, $chapo, $img, $title);
            if (!$success) {
                throw new \Exception('Impossible de modifier le post!');
            } else {
                header('Location: index.php?action=adminonepost&post_id=' . $post_id);
            }
        }

        header('Location: index.php?action=adminonepost&post_id=' . $post_id);
    }
}
