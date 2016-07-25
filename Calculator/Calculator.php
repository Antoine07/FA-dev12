<?php

class Calculator
{

    private $res = 0;

    public function add($a, $b)
    {
        if (is_numeric($a) && is_numeric($b)) {
            $this->res = $a + $b;

            return;
        }

        die(sprintf('a %s, b %s bad values', $a, $b));
    }

    public function mult($a, $b)
    {
        if (is_numeric($a) && is_numeric($b)) {
            $this->res = $a * $b;

            return;
        }

        die(sprintf('a %s, b %s bad values', $a, $b));
    }


    public function reset()
    {
        $this->res = 0;
    }

    public function result()
    {
        return $this->res;
    }
}