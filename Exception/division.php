<?php
try {

    $a = 10;
    $b = 0;

    if ($b == 0) {
        // arrête le script sauf si vous attrapez l'exception
        throw new Exception('vous ne pouvez pas diviser par zéro');
    }

    $result = $a / $b;

    echo $result;


} catch (Exception $e) {
    var_dump($e->getMessage());
}
