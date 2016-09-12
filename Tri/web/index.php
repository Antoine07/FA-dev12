<?php

$list = [1, 5, 0, 45, 7];
$len = count($list);

// comprendre le test dans la deuxième boucle

for ($i = 1; $i < $len; $i++) {
    $elem = $list[$i];
    for ($j = $i; $j > 0 && $list[$j - 1] > $elem; $j--) {
        $list[$j] = $list[$j - 1];
    }
    $list[$j] = $elem;
    echo "j: $j -->" . show($list);
    echo "<br>";
}

function show(array $list)
{
    $html = '';
    foreach($list as $elem) $html.="-$elem-";

    return $html;
}