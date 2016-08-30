<?php
require 'Selection.php';

$selection = new \Selection\Selection();


$list = [1,3, 5, 45, 7, 11];

$ordList = $selection->run($list);


echo "<pre>";
print_r($ordList);
echo "</pre>";
