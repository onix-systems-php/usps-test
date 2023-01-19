<?php

namespace App;

class DB
{
    static private \PDO $connection;

    static public function getConnection(): \PDO
    {
        if (!isset(self::$connection)) {
            self::$connection = new \PDO(
                "pgsql:host={$_ENV['POSTGRES_HOSTNAME']};dbname={$_ENV['POSTGRES_DB_NAME']}",
                $_ENV['POSTGRES_USER'],
                $_ENV['POSTGRES_PASSWORD']
            );
        }
        return self::$connection;
    }

}