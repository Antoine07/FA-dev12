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

//$prepare->execute();

// parameters position place holder, valeur, type attendu par MySQL
$prepare->bindValue(1, 'cyclope', PDO::PARAM_STR);
$prepare->bindValue(2, 2, PDO::PARAM_INT);
$prepare->bindValue(3, 2, PDO::PARAM_INT);

//$prepare->execute();

// injection


// users table MySQL

$username = "Tony'-- ";
$password = 'blabla';

$sql = sprintf("
        SELECT *
        FROM users
        WHERE username='%s' AND password='%s'
        ", $username, $password);

//var_dump($sql);

$stmt = $pdo->query($sql);

echo "<h1>Connection réussi</h1>";
var_dump($stmt->fetch());

// protection injection

$username = "Tony'-- ";
$password = 'blabla';

$sql = sprintf("
        SELECT *
        FROM users
        WHERE username='%s' AND password='%s'
        ", $pdo->quote($username), $pdo->quote($password));

//var_dump($sql);

try{

    $stmt = $pdo->query($sql);

    echo "<h1>Connection stoppée</h1>";
    var_dump($stmt->fetch());


}catch(PDOException $e)
{
    echo "<p>votre connexion a échouée</p>";
}


/*--------------------------------*\
*             prepare
/*--------------------------------*/

$prepare = $pdo->prepare('SELECT * FROM `users` WHERE username=? AND password=? ');

$prepare->bindValue(1, "Antoine", PDO::PARAM_STR);
$prepare->bindValue(2, sha1("Antoine"), PDO::PARAM_STR);

$prepare->execute();


var_dump($prepare->fetch());























































