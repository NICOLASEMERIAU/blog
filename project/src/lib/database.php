<?php

namespace Application\Lib\Database;

class Database
{
    public ?\PDO $database = null;

    public function getConnexion(): \PDO
    {
        if ($this->database === null) {
            $this->database = new \PDO('mysql:host=db_docker_blog;dbname=blog;charset=utf8', 'root', '');
        }

        return $this->database;
    }
}
