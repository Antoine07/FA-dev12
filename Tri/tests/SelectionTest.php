<?php

use Selection\Selection;


class SelectionTest extends PHPUnit_Framework_TestCase
{

    private $selection = null;

    public function setUp()
    {
        $this->selection = new Selection();
    }


    public function testList()
    {
        $list = [1, 5, 45, 7, 21, 3, 568, 2, 4,];

        $ordList = $this->selection->run($list);

        sort($list);

        $this->assertEquals($list, $ordList);

    }

}