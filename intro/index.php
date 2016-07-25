<?php

class Car
{

    // variables de classe, attributs de la classe
    private $wheel = 4;

    // fonctions classes, les méthodes de votre classe
    public function getWheel()
    {
        return $this->wheel;
    }

    public function setWheel($nb)
    {

        $nb = (int)$nb;

        if ($nb == 3 || $nb == 4) {
            $this->wheel = $nb;

            return;
        }

        echo sprintf('<p>nombre de roues incorrect, nb : %d </p>', $nb);

    }

}

$car1 = new Car;

//var_dump($car1->wheel);
var_dump($car1->getWheel());
$car1->setWheel('foo'); // modifie le nombre de roues de la voiture $car1
var_dump('--------------- $car1 nb wheels');
var_dump($car1->getWheel());

$car2 = new Car;

var_dump($car2);
var_dump('--------------- $car2 nb wheels');

var_dump($car2->getWheel());

echo "<br>";
var_dump('------------ tests nombres de roues');
echo "<br>";

$car2->setWheel(4);
$car2->setWheel(3);
$car2->setWheel("3 roues");
$car2->setWheel("4 roues");


$car2->setWheel(5);
$car2->setWheel("foo");






