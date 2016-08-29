<?php

/*--------------------------------*\
*             App
/*--------------------------------*/
const INFINITE = 100000;
$matrix = include __DIR__ . '/../storage/graph3.php';
include __DIR__ . '/../src/Dijkstra.php';

$dijkstra = new Dijkstra($matrix);

$dijkstra->setCodeNode(['A', 'B', 'C', 'D', 'E', 'F', 'G']);

try{
    $dijkstra->run();
}catch(RuntimeException $e)
{
    echo "<pre>";
    print_r($dijkstra);
    echo "</pre>";
}


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
