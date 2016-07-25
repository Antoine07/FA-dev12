<?php

require_once 'Calculator.php';

$calculator = new Calculator;

$calculator->add(120,230);
$calculator->add(120,230);


var_dump($calculator->result());

$calculator->reset();

$calculator->mult(6,7);

var_dump($calculator->result());


$calculator->add('foo', 4);