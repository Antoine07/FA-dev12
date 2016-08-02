<?php

class Kermit extends Monster
{
    protected $type = 'kermit';

    public function jum()
    {
        $rate = $this->getRate();
        if(!is_null($rate) && $rate > 0)
        {
            $rate--;
            $this->setRate($rate);
        }
    }

}