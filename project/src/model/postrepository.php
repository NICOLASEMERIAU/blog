<?php


namespace Application\Model\PostRepository;

require_once('src/lib/database.php');
require_once('src/model/post.php');

use Application\Lib\Database\Database;
use Application\Model\Post\Post;

class PostRepository
{
    public const POSTS_PER_PAGE = 4;
    
    public Database $connexion;

    public function getPost(string $identifier): Post
    {
        $statement = $this->connexion->getConnexion()->prepare(
            "SELECT id_post, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') 
            AS french_creation_date, img, chapo FROM posts WHERE id_post = ?"
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        if ($row === false){
            throw new \Exception('Aucun identifiant de billet envoyé');
        } 

        $post = new Post();
        $post->title = $row['title'];
        $post->frenchCreationDate = $row['french_creation_date'];
        $post->content = $row['content'];
        $post->identifier = $row['id_post'];
        $post->image = $row['img'];
        $post->chapo = $row['chapo'];


        return $post;
    }

    public function getPosts(int $page): array
    {
        $offset = ($page - 1) * self::POSTS_PER_PAGE;
        $statement = $this->connexion->getConnexion()->query(
            "SELECT id_post, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, img, chapo FROM posts 
            ORDER BY creation_date DESC LIMIT ".$offset.", ".self::POSTS_PER_PAGE
        );
        $posts = [];
        while (($row = $statement->fetch())) {
            $post = new Post();
            $post->title = $row['title'];
            $post->frenchCreationDate = $row['french_creation_date'];
            $post->content = $row['content'];
            $post->identifier = $row['id_post'];
            $post->image = $row['img'];
            $post->chapo = $row['chapo'];


            $posts[] = $post;
        }

        return $posts;
    }

    public function countTotal() : int
    {
        $statement = $this->connexion->getConnexion()->prepare("SELECT COUNT(id_post) FROM posts");
        $statement->execute();

        return $statement->fetchColumn();


    }

    public function createPost(string $user_id, string $content, string $chapo, string $img, string $title): bool
    {
        $statement = $this->connexion->getConnexion()->prepare(
            'INSERT INTO posts(author_id, content, chapo, img, title, creation_date) VALUES(?, ?, ?, ?, ?, NOW())'
        );
        $affectedLines = $statement->execute([$user_id, $content, $chapo, $img, $title]);

        return ($affectedLines > 0);
    }

    public function updatePost(string $identifier, string $content, string $chapo, string $img, string $title): bool
    {
        $statement = $this->connexion->getConnexion()->prepare(
            'UPDATE posts SET content = ?, chapo = ?, img = ?, title = ? WHERE id_post = ?'
        );
        $affectedLines = $statement->execute([$content, $chapo, $img, $title, $identifier]);

        return ($affectedLines > 0);
    }    
    
    public function deletePost(string $identifier): bool
    {
        $statement = $this->connexion->getConnexion()->prepare(
            'DELETE FROM posts WHERE id_post = ?'
        );
        $affectedLines = $statement->execute([$identifier]);

        return ($affectedLines > 0);
    }

}
