<?php

namespace Application\Controllers\Connect;

require_once('src/lib/database.php');
require_once('src/model/connect.php');


use Application\Lib\Database\DatabaseConnection;
use Application\Model\Connect\Verification;


class Connect
{
    public function execute(array $input)
    {
        $connection = new DatabaseConnection();

        $verification = new Verification();
        $verification->connection = $connection;
        $success = $verification->verify($input);
        if (!$success) {
            throw new \Exception('Impossible de se connecter !');
        } else {
            $connect= $verification->session($input);
            header('Location: index.php?action=list');
        }
    }
}
