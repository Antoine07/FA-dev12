<?php

require_once 'Calculator.php';

$calculator = new Calculator;

$calculator->add(1,2,3,4,5,6,7,8,9,10);
$calculator->add(10,10,10,10);


var_dump($calculator->result());

$calculator->reset();

$calculator->mult(6,7);
$calculator->mult(6,7);

var_dump($calculator->result());


$calculator->add('foo', 4);





