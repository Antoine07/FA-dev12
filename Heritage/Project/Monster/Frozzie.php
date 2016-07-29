<?php

class Fozzie extends Monster
{
    protected $type = 'Frozzie';

    public function run()
    {
        $rate = $this->getRate();

        if (!is_null($rate) && $rate > 0) {
            $rate--;
            $this->setRate($rate);
        }

    }
}