<?php


class Monster
{

    private $id;
    private $name;
    private $life;
    private $force;
    private $maxForce = 800;
    private $speed = 100;

    public function __construct($monster)
    {

        if (isset($monster->id)) {
            $this->setId($monster->id);
        }

        if (isset($monster->name)) {
            $this->setName($monster->name);
        }

        if (isset($monster->force)) {
            $this->setForce($monster->force);
        }

        if (isset($monster->life)) {
            $this->setLife($monster->life);
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
    public function getLife()
    {
        return $this->life;
    }

    /**
     * @param mixed $life
     */
    public function setLife($life)
    {
        if ($life >= 0 && $life < 101) {
            $this->life = $life;
        }
    }

    /**
     * @return mixed
     */
    public function getForce()
    {
        return $this->force;
    }

    /**
     * @param mixed $force
     */
    public function setForce($force)
    {
        if ($force >= 0 && $force < 801) {
            $this->force = $force;
        }
    }

    public function speed()
    {
        $s = max(($this->maxForce / $this->force) * $this->speed, 50);
    }

}