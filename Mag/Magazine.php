<?php

use Connect\Connect;
use Observer\Pattern\Observer;
use Observer\Pattern\Subject;

class Magazine implements Subject
{

    private $observers;
    private $pdo;
    private $date;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();

        $this->pdo = Connect::$pdo;
    }

    public function create($message)
    {

        $message = $this->pdo->quote($message);
        $datetime = new \DateTime('now');

        $this->date = $datetime->format('Y_m-d H:i:s');

        $sql = sprintf("
                        INSERT
                        INTO messages (content, published_at)
                        VALUES (%s, '%s');
                        ",
                        $message,
                        $this->date
        );

        $this->pdo->query($sql);

        $this->notify();
    }


    /**
     * @param Observer $obs
     * @return $this
     */
    public function attach(Observer $obs)
    {
        $this->observers->attach($obs);

        return $this;
    }

    /**
     * @param Observer $obs
     * @return $this
     */
    public function detach(Observer $obs)
    {
        $this->observers->detach($obs);

        return $this;
    }

    /**
     * @return datetime Y-m-d H:i:s
     */
    public function get()
    {
        return $this->date;
    }


    public function notify()
    {
        foreach ($this->observers as $observer) $observer->updated($this);

    }
}