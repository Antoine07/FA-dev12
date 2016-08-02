<?php

class Monster
{
    protected $id;
    protected $name;
    protected $rate = null;
    protected $type = null;


    public function __construct(array $data)
    {
        foreach ($data as $field => $value) {
            $method = 'set' . ucfirst($field);
            if (method_exists($this, $method))
                $this->$method($value);
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = (int)$id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = (string)$name;
    }


    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param mixed $rate
     */
    public function setRate($rate)
    {
        if (is_null($rate)) {
            $this->rate = null;

            return;
        }

        if (($rate >= 0 && $rate <= 10))
            $this->rate = (int)$rate;
    }

    /**
     * @return null
     */
    public function getType()
    {
        return $this->type;
    }


}