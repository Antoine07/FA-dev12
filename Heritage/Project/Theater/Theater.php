<?php

class Theater
{
    private $place = 25;
    private $balcony = [];
    private $maxBalcony = 10;
    private $parterre = [];
    private $maxParterre = 15;
    private $listWait = [];

    public function add(Monster $monster)
    {

        if (is_null($monster->getRate()) || $this->place <= 0){
            $this->listWait[] = $monster;

            return;
        }

        if ($monster->getRate() >= 5 && $this->maxBalcony > 0) {
            $this->balcony[] = $monster;
            $this->maxBalcony--;
        } else {
            if ($this->maxParterre > 0) {
                $this->parterre[] = $monster;
                $this->maxParterre--;
            } else
            {
                $this->listWait[] = $monster;

                return;
            }
        }

        $this->place--;
    }

    /**
     * @return int
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @return array
     */
    public function getBalcony()
    {
        return $this->balcony;
    }

    /**
     * @return array
     */
    public function getParterre()
    {
        return $this->parterre;
    }

    /**
     * @return array
     */
    public function getListWait()
    {
        return $this->listWait;
    }

}