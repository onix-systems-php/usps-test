<?php

namespace Core;

use PDO;

class DB
{
    static private PDO $connection;

    public static function getConnection(): PDO
    {
        if (!isset(self::$connection)) {
            self::$connection = new PDO(
                "mysql:host={$_ENV['MYSQL_HOSTNAME']};dbname={$_ENV['MYSQL_DB_NAME']}",
                $_ENV['MYSQL_USER'],
                $_ENV['MYSQL_PASSWORD']
            );
        }

        return self::$connection;
    }

}
