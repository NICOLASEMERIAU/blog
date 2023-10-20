<?php

namespace Application\Model\UsersRepository;

require_once('src/lib/database.php');
require_once('src/model/user.php');

use Application\Lib\Database\Database;
use Application\Model\User\User;


class UsersRepository
{
    public Database $connexion;   

    public function getUsers(): array
    {
        $statement = $this->connexion->getConnexion()->prepare(
            "SELECT * FROM users ORDER BY id_user DESC"
        );
        $statement->execute();

        $users = [];
        while (($row = $statement->fetch())) {
            $user = new User();
            $user->identifier = $row['id_user'];
            $user->firstname = $row['firstname'];
            $user->lastname = $row['lastname'];
            $user->mail = $row['mail'];
            $user->role_id = $row['role_id'];

            $users[] = $user;
        }

        return $users;
    }

    public function createUser(string $firstname, string $lastname, string $mail, string $password): bool
    {
        $statement = $this->connexion->getConnexion()->prepare(
            'INSERT INTO users(firstname, lastname, mail, password_user) VALUES(?, ?, ?, ?)'
        );
        $affectedLines = $statement->execute([$firstname, $lastname, $mail, $password]);

        return ($affectedLines > 0);
    }

    public function modifyUserStatus(string $identifier, string $role_id): bool
    {
        $statement = $this->connexion->getConnexion()->prepare(
            'UPDATE users SET role_id = ? WHERE id_user = ?'
        );
        $affectedLines = $statement->execute([$role_id, $identifier]);

        return ($affectedLines > 0);
    }

}
