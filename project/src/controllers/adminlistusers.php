<?php

namespace Application\Controllers\AdminListUsers;

require_once('src/lib/database.php');
require_once('src/model/user.php');
require_once('src/model/usersrepository.php');
require_once('src/model/rolesrepository.php');

use Application\Lib\Database\Database;
use Application\Model\rolesRepository\rolesRepository;
use Application\Model\UsersRepository\UsersRepository;
use Application\Model\User\User;

class AdminListUsers
{
    public function execute()
    {

        $connexion = new Database();

        $usersRepository = new UsersRepository();
        $usersRepository->connexion = $connexion;
        $users = $usersRepository->getUsers();

        $rolesRepository = new rolesRepository();
        $rolesRepository->connexion = $connexion;
        $roles = $rolesRepository->getroles();

        require('templates/adminlistusers.php');
    }
}
