<?php

namespace Application\Controllers\Connexion;

require_once('src/lib/database.php');
require_once('src/model/connexionuser.php');
require_once('src/model/connected.php');


use Application\Lib\Database\Database;
use Application\Model\ConnexionUser\ConnexionUser;
use Application\Model\Connected\Connected;


class Connexion
{
    public function execute(array $input)
    {
        $connexion = new Database();

        $verification = new ConnexionUser();
        $verification->connexion = $connexion;
        $success = $verification->verifyConnexion($input);
        if (!$success) {
            throw new \Exception('Impossible de se connecter ! Trop triste!');

        } else {
            $connected = new Connected();
            $connected = $verification->openSession($input);    
            $_SESSION["firstname"] = $connected->firstname;
            $_SESSION["lastname"] = $connected->lastname;
            $_SESSION["mail"] = $connected->mail;
            $_SESSION["role_id"] = $connected->role_id;
            $_SESSION["user_id"] = $connected->identifier;

            header('Location: index.php?action=list');
        }
    }
}
