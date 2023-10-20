<?php

namespace Application\Controllers\UserAdd;

require_once('src/lib/database.php');
require_once('src/model/user.php');
require_once('src/model/usersrepository.php');

use Application\Lib\Database\Database;
use Application\Model\User\User;
use Application\Model\UsersRepository\UsersRepository;

class UserAdd
{
    public function execute(array $input)
    {
        if (!empty($input['firstname']) && !empty($input['lastname']) && !empty($input['mail']) && !empty($input['password'])) {
            $firstname = $input['firstname'];
            $lastname = $input['lastname'];
            $mail = $input['mail'];
            $password = password_hash($input['password'], PASSWORD_DEFAULT);
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $userRepository = new UsersRepository();
        $userRepository->connexion = new Database();
        $success = $userRepository->createUser($firstname, $lastname, $mail, $password);
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter le nouvel utilisateur !');
        } else {
            $_SESSION["registration"] = true;
            header('Location: index.php?action=connexionpage');
        }
    }
}
