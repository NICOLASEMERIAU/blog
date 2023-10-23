<?php

namespace Application\Model\CommentRepository;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use Application\Lib\Database\Database;
use Application\Model\Comment\Comment;


class CommentRepository
{
    public Database $connexion;

    public function getComments(string $post): array
    {
        $statement = $this->connexion->getConnexion()->prepare(
            "SELECT id_comment, user_id, firstname, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, post_id, validation_comment
            FROM comments 
            INNER JOIN users ON users.id_user = comments.user_id
            WHERE post_id = ? ORDER BY comment_date DESC"
        );
        $statement->execute([$post]);

        $comments = [];
        while (($row = $statement->fetch())) {
            $comment = new Comment();
            $comment->identifier = $row['id_comment'];
            $comment->user_id = $row['user_id'];
            $comment->firstname = $row['firstname'];
            $comment->frenchCreationDate = $row['french_creation_date'];
            $comment->comment = $row['comment'];
            $comment->post = $row['post_id'];
            $comment->validation = $row['validation_comment'];


            $comments[] = $comment;
        }

        return $comments;
    }    
    
    public function getUnvalidatedComments(): array
    {
        $statement = $this->connexion->getConnexion()->prepare(
            "SELECT firstname, id_comment, post_id, user_id, comment, validation_comment,
            DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date
            FROM comments
            INNER JOIN users ON users.id_user = comments.user_id
            WHERE validation_comment = 'non'
            ORDER BY comment_date DESC"
        );
        $statement->execute();

        $comments = [];
        while (($row = $statement->fetch())) {
            $comment = new Comment();
            $comment->identifier = $row['id_comment'];
            $comment->user_id = $row['user_id'];
            $comment->frenchCreationDate = $row['french_creation_date'];
            $comment->comment = $row['comment'];
            $comment->post = $row['post_id'];
            $comment->validation = $row['validation_comment'];
            $comment->firstname = $row['firstname'];


            $comments[] = $comment;
        }

        return $comments;
    }

    public function getComment(string $identifier): ?Comment
    {
        $statement = $this->connexion->getConnexion()->prepare(
            "SELECT id_comment, user_id, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, post_id, validation_comment
            FROM comments 
            WHERE id_comment = ?"
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

        $comment = new Comment();
        $comment->identifier = $row['id_comment'];
        $comment->user_id = $row['user_id'];
        $comment->frenchCreationDate = $row['french_creation_date'];
        $comment->comment = $row['comment'];
        $comment->post = $row['post_id'];
        $comment->validation = $row['validation_comment'];

        return $comment;
    }

    public function createComment(string $post, string $user_id, string $comment): bool
    {
        $statement = $this->connexion->getConnexion()->prepare(
            'INSERT INTO comments(post_id, user_id, comment, comment_date) VALUES(?, ?, ?, NOW())'
        );
        $affectedLines = $statement->execute([$post, $user_id, $comment]);

        return ($affectedLines > 0);
    }

    public function updateComment(string $identifier, string $user_id, string $comment): bool
    {
        $statement = $this->connexion->getConnexion()->prepare(
            'UPDATE comments SET user_id = ?, comment = ? WHERE id_comment = ?'
        );
        $affectedLines = $statement->execute([$user_id, $comment, $identifier]);

        return ($affectedLines > 0);
    }

    public function validateComment(string $identifier): bool
    {
        $statement = $this->connexion->getConnexion()->prepare(
            'UPDATE comments SET validation_comment = "oui" WHERE id_comment = ?'
        );
        $affectedLines = $statement->execute([$identifier]);

        return ($affectedLines > 0);
    }
}
