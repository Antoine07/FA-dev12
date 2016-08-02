<?php

/*--------------------------------*\
*             Autoload
/*--------------------------------*/


/*--------------------------------*\
*             Bootstrap
/*--------------------------------*/

require_once 'Connect/Connect.php';
require_once 'Monster/Monster.php';
require_once 'Monster/Kermit.php';
require_once 'Monster/Frozzie.php';
require_once 'Theater/Theater.php';

$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // flux en utf8
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // mysql erreurs remontées
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // données dans des objetds
];

$database = [
    'dns' => 'mysql:host=localhost;dbname=db_theater',
    'username' => 'root',
    'password' => ''
];

$connect = new Connect($database, $options);

$pdo = $connect->getPDO();


/*--------------------------------*\
*             Controller
/*--------------------------------*/

$name = 'Kermit';
$name2 = 'Frozzie';
$sql = sprintf("SELECT * FROM muppets WHERE name='%s'", $name);
$sql2 = sprintf("SELECT * FROM muppets WHERE name='%s'", $name2);

$stmt = $pdo->query($sql);
$data = $stmt->fetch();

$stmt2 = $pdo->query($sql2);
$data2 = $stmt->fetch();

$kermit = new Kermit($data);
$frozzie = new Frozzie($data2);

//var_dump($kermit->getRate());

$kermit->jum();
$kermit->jum();
$kermit->jum();

//var_dump($kermit->getRate());

//var_dump($frozzie->getRate());
$frozzie->run();
$frozzie->run();
$frozzie->run();
//var_dump($frozzie->getRate());

/*--------------------------------*\
*             Theater
/*--------------------------------*/

$theater = new Theater;

$name = 'Kermit';
$sql = sprintf("SELECT * FROM muppets WHERE name='%s'", $name);
$stmt = $pdo->query($sql);

while($data = $stmt->fetch()){
    $theater->add(new Kermit($data));
}

$name = 'Frozzie';
$sql = sprintf("SELECT * FROM muppets WHERE name='%s'", $name);
$stmt = $pdo->query($sql);

while($data = $stmt->fetch()){
    $theater->add(new Frozzie($data));
}

$nbPlace = $theater->getPlace();
$nbBalcony = count($theater->getBalcony());
$nbBPaterre = count($theater->getParterre());
$excludes = $theater->getListWait();

$e = "<ul>";
foreach($excludes as $m)
{
    $e .= "<li>monster id: {$m->getId()} type: {$m->getType()}</li>";
}
$e .= "</ul>";

$content = <<<EOT
    <ul>
        <li>Nombre de place restantes: $nbPlace</li>
        <li>Nombre de places balcony occupées: $nbBalcony</li>
        <li>Nombre de places parterre occupées: $nbBPaterre</li>
        <li>Nombre de monster en liste d'attente: $e</li>
    </ul>
EOT;

/*--------------------------------*\
*             Views
/*--------------------------------*/

$title = "Muppet Show";

$render = <<<EOT
<!doctype html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>$title</title>
</head>
<body>
<section>
    $content
</section>
</body>
</html>
EOT;

echo $render;
