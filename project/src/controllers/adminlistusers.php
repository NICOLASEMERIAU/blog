<?php

namespace Application\Controllers\AdminListUsers;

require_once('src/lib/database.php');
require_once('src/model/user.php');
require_once('src/model/usersrepository.php');

use Application\Lib\Database\Database;
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

        require('templates/adminlistusers.php');
    }
}
