<?php

class Connect{

    private $pdo ;

    public function __construct($database)
    {
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // flux en utf8
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // mysql erreurs remontées
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // données dans des objetds
        ];

        $this->pdo = new PDO(
            $database['dns'],
            $database['username'],
            $database['password'], $options);
    }

    public function getPDO()
    {
        return $this->pdo;
    }

}


