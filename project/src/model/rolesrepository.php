<?php

namespace Application\Model\rolesRepository;

require_once('src/lib/database.php');
require_once('src/model/role.php');

use Application\Lib\Database\Database;
use Application\Model\Role\Role;


class rolesRepository
{
    public Database $connexion;

    public function getroles(): array
    {
        $statement = $this->connexion->getConnexion()->prepare(
            "SELECT * FROM roles ORDER BY id DESC"
        );
        $statement->execute();

        $roles = [];
        while (($row = $statement->fetch())) {
            $role = new role();
            $role->identifier = $row['id'];
            $role->role = $row['role'];

            $roles[] = $role;
        }

        return $roles;
    }

}
