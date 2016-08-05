<?php
namespace Connect;

class Connect
{

    public static $pdo = null;

    public static function set($database, $options = [])
    {

        self::$pdo = new \PDO(
            $database['dsn'],
            $database['username'],
            $database['password'],
            $options
        );
    }

}