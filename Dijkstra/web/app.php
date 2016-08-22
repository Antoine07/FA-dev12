<?php

/*--------------------------------*\
*             Algo
/*--------------------------------*/

$matrix = include __DIR__ . '/../storage/matrix.php';




/*--------------------------------*\
*             View
/*--------------------------------*/
ob_start();
$cpt = 0;
$pattern = include __DIR__ . '/../storage/pattern.php';

include __DIR__ . '/../view/graph.php';
$content = ob_get_clean();

ob_start();
include __DIR__ . '/../view/layout.php';
$view = ob_get_clean();

echo $view;
