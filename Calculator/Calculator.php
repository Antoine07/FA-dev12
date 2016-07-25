<?php

class Calculator
{

    private $res = 0;

    public function add(...$numbers)
    {

        foreach ($numbers as $number) {
            if (!is_numeric($number)) {
                die(sprintf('ce nombre non numerique: %s', $number));
            }

            $this->res += $number;
        }

    }

    public function mult(...$numbers)
    {

        if ($this->res == 0) $this->res = 1;

        foreach ($numbers as $number) {
            if (!is_numeric($number)) {
                die(sprintf('ce nombre non numerique: %s', $number));
            }

            $this->res *= $number;
        }

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