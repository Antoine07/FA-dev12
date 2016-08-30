<?php

namespace Insertion;


class Insertion
{

    public function run(array $list)
    {

        $len = count($list);
        for ($i = 0; $i < $len; $i++) {

            $elem = $list[$i];
            for ($j = 0; $j < ($i + 1); $j++) {
                if ($list[$j] < $elem) {
                    $list[$i] = $list[$j];
                    $list[$j] = $elem;
                }
            }
        }

        return $list;
    }

}