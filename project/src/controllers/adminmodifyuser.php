<?php

namespace Application\Controllers\AdminModifyUser;

require_once('src/lib/database.php');
require_once('src/model/user.php');
require_once('src/model/usersRepository.php');

use Application\Lib\Database\Database;
use Application\Model\User\User;
use Application\Model\UsersRepository\UsersRepository;

class AdminModifyUser
{
    public function execute(?array $input): mixed
    {
        if ($input !== null)
        {
            $user_id = null;
            $comment = null;
            if (!empty($input['role']) && !empty($input['user_id'])) {
                $role_id = $input['role'];
                $identifier = $input['user_id'];
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }

            $usersRepository = new UsersRepository();
            $usersRepository->connexion = new Database();
            $usersRepository->modifyUserStatus($identifier, $role_id);

            header('Location: index.php?action=adminlistuser');

        }
    }
}
