<?php

namespace App;

use PDO;

class Database
{
    private PDO $connection;

    /**
     * Database constructor.
     */
    public function __construct()
    {

        $config = require __DIR__ ."/../config/config.php";


        $pdo = new PDO($config["database"]["connection"],$config["database"]["username"],
            $config["database"]["password"],$config["database"]["options"] );

        $this->connection = $pdo;
    }

    /**
     * @return PDO
     */
    public static function getConnection(): PDO
    {
        $DB = new Database();
        return $DB->connection;
    }
}