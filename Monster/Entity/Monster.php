<?php


class Monster
{

    private $id;
    private $name;
    private $life;
    private $force;

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
        $this->id = $id;
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
        $this->name = $name;
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
        $this->life = $life;
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
        $this->force = $force;
    }

    

}