<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 04/08/2016
 * Time: 21:05
 */

namespace Observer\Observers;

use Connect\Connect;
use Observer\Pattern\Observer;
use Observer\Pattern\Subject;

class DB implements Observer
{
    private $pdo;
    private $table;

    public function __construct($table)
    {
        $this->pdo = Connect::$pdo;
        $this->table = $table;
    }

    /**
     * updated insert ou met à jour (update) la notification en utilisant la methode get du sujet
     *
     * @param Subject $subject
     */
    public function updated(Subject $subject)
    {
        $sql = sprintf("
                        INSERT INTO
                        {$this->table} (published_at)
                        VALUES ('%s')
                        ",
            $subject->get()
        );

        $this->pdo->query($sql);
    }

}