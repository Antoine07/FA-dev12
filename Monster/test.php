<?php
require_once 'Connect/Connect.php';
require_once 'Entity/Monster.php';

$database = [
    'dns' => 'mysql:host=localhost;dbname=db_game',
    'username' => 'root',
    'password' => ''
];

$connect = new Connect($database);

$pdo = $connect->getPDO(); // instance de PDO
//$pdo = null; // couper la connexion

$stmt = $pdo->query('SELECT * FROM monsters');

$Monsters = [];

var_dump($stmt);

foreach($stmt as $monster)
{
    var_dump($monster);
    // pusher les monsters objet dans le tableau $Monsters
    $Monsters[] = new Monster($monster);
}

