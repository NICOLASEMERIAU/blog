<?php

namespace Application\Model\Connect;

require_once('src/lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class Connect
{
    public string $firstname;
    public string $lastname;
    public string $identifier;
    public string $mail;
    public string $password;
    public string $role_id;
}

class Verification
{
    public DatabaseConnection $connection;

    public function verify(array $input): bool
    {
        $mail=$input['mail'];
        $password=$input['password'];
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, firstname, lastname, role_id FROM users WHERE mail = ? AND password = ?"
        );
        $affectedLines = $statement->execute([$mail,$password]);

        return ($affectedLines > 0);
    }

    public function session(array $input): Connect
    {
        $mail=$input['mail'];
        $password=$input['password'];
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, firstname, lastname, role_id FROM users WHERE mail = ? AND password = ?"
        );
        $statement->execute([$mail,$password]);
        $row = $statement->fetch();
        $connect = new Connect();
        $connect->identifier = $row['id'];
        $connect->firstname = $row['firstname'];
        $connect->lastname = $row['lastname'];
        $connect->mail = $mail;
        $connect->password = $password;
        $connect->role_id = $row['role_id'];

        return $connect;
    }
}
