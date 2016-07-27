<?php

// configuration
$database = [
    'dns' => 'mysql:host=localhost;dbname=db_game',
    'username' => 'root',
    'password' => ''
];

$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // flux en utf8
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // mysql erreurs remontées
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // données dans des objetds
];

$pdo = new PDO($database['dns'], $database['username'], $database['password'], $options);

var_dump($pdo);

// PDOStatement
$stmt = $pdo->query('SELECT * FROM `monsters`');

var_dump($stmt);

foreach ($stmt as $monster) {
    echo "<p>{$monster->name}</p>";
}


// insertion de données

$sql = sprintf(" INSERT INTO `monsters` (name, life, `force`)
     VALUES ('%s', %d, %d)
     ",
    'dracula',
    2,
    2
);

// $pdo->query($sql);


// requête préparé optimiser l'insertion le DQL ...


// prepare compilera la requête côté MySQL
$prepare = $pdo->prepare('INSERT INTO `monsters` (`name`, life, `force`) VALUES (?, ?, ?) ');

var_dump($prepare);

// parameters position place holder, valeur, type attendu par MySQL
$prepare->bindValue(1, 'kiki', PDO::PARAM_STR);
$prepare->bindValue(2, 4, PDO::PARAM_INT);
$prepare->bindValue(3, 4, PDO::PARAM_INT);

$prepare->execute();

// parameters position place holder, valeur, type attendu par MySQL
$prepare->bindValue(1, 'cyclope', PDO::PARAM_STR);
$prepare->bindValue(2, 2, PDO::PARAM_INT);
$prepare->bindValue(3, 2, PDO::PARAM_INT);

$prepare->execute();



// injection


























































