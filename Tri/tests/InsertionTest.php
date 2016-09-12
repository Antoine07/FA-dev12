<?php

use Insertion\Insertion;


class InsertionTest extends PHPUnit_Framework_TestCase
{

    private $insertion = null;

    public function setUp()
    {
        $this->insertion = new Insertion();
    }


    public function testList()
    {
        $list = [1, 5, 0, 45, 7];

        $ordList = $this->insertion->run($list);

        sort($list);

        $this->assertEquals($list, $ordList);

    }

}