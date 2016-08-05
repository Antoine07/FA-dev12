<?php

namespace Observer\Observers;

use Observer\Pattern\Observer;
use Observer\Pattern\Subject;

class File implements Observer
{
    protected $splFile;

    public function __construct($fileName, $option)
    {
        $this->splFile = new \SplFileObject($fileName, $option);
    }
    public function updated(Subject $subject)
    {
       $this->splFile->fwrite($subject->get());
    }
}