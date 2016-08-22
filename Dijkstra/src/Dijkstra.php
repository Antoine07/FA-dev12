<?php


class Dijkstra
{

    private $graph = [];


    public function __construct($graph)
    {
        $this->graph = json_decode($graph);
    }

    public function render()
    {
        if (empty($this->graph)) throw new RuntimeException(sprintf('no data '));

        foreach ($this->graph as $line) {

        }
    }

}