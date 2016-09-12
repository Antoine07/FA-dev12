<?php

namespace Insertion;

/**
 * Class Insertion
 * @package Insertion
 * Tri par insertion
 */

class Insertion
{

    public function run(array $list)
    {
        $len = count($list);
        for ($i = 1; $i < $len; $i++) {
            $elem = $list[$i];
            // si le test est false on sort de la boucle
            for ($j = $i; $j > 0 && $list[$j - 1] > $elem; $j--) {
                $list[$j] = $list[$j - 1]; // on décalle insertion
            }
            // $j prend la valeur de la dernière valeur (premier false)
            $list[$j] = $elem;
        }

        return $list;
    }

}