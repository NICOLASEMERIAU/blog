<?php

namespace Application\Model\ConnexionUser;

require_once('src/lib/database.php');
require_once('src/model/connected.php');

use Application\Lib\Database\Database;
use Application\Model\Connected\Connected;


class ConnexionUser
{
    public Database $connexion;

    public function verifyConnexion(array $input): bool
    {
        $statement = $this->connexion->getConnexion()->prepare(
            "SELECT password_user FROM users WHERE mail = ?"
        );
        $statement->execute([$input['mail']]);
        $row = $statement->fetch();

        if($row)
        { 
            $hash = $row['password_user'];
            if (password_verify( $input['password'] , $hash ))
            {
                return true;
            }
    
        }
        else
        {
            return false;
        }
    }

    public function openSession(array $input): Connected
    {
        $statement = $this->connexion->getConnexion()->prepare(
            "SELECT id_user, firstname, lastname, mail, role_id FROM users WHERE mail = ?"
        );
        $statement->execute([$input['mail']]);
        $row = $statement->fetch();
        $connect = new Connected();
        $connect->identifier = $row['id_user'];
        $connect->firstname = $row['firstname'];
        $connect->lastname = $row['lastname'];
        $connect->mail = $row['mail'];
        $connect->role_id = $row['role_id'];

        return $connect;
    }
}
