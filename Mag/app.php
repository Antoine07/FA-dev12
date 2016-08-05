<?php

spl_autoload_register(function ($class) {

    require_once str_replace('\\', '/', $class) . '.php';

});

use Connect\Connect;
use Observer\Observers\DB;
use Observer\Observers\File;

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
];

$database = [
    'dsn' => 'sqlite:' . __DIR__ . '/storage/database.sqlite',
    'username' => null,
    'password' => null,
];

Connect::set($database, $options);

var_dump(Connect::$pdo);

// observers
$db = new DB('histories');
$file = new File(__DIR__ . '/storage/data.txt', 'a+');

// subjects
$message = new Magazine;
$message->attach($db);
$message->attach($file);

$message->create('Hello world');
