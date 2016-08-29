<?php


class Dijkstra
{

    private $graph = [];
    private $states = [];
    private $nodes = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
    private $lockNodes = [0];
    const INFINITE = 100000;
    private static $cpt = 0;

    public function __construct(array $graph)
    {
        $this->graph = $graph;
    }

    public function state($nodeState = 0, $dOrigin = 0)
    {
        self::$cpt++;

        foreach ($this->graph[$nodeState] as $node => $distance) {

            if ($distance == self::INFINITE) continue;

            if (in_array($node, $this->lockNodes)) continue;

            $this->states[] = [
                'coordinate' => [
                    'node' => $node,
                    'origin' => $nodeState
                ],
                'node' => $this->nodes[$node],
                'origin' => $this->nodes[$nodeState],
                'distance' => $distance + $dOrigin,
                'status' => 0,
                'number' => self::$cpt
            ];

        }

    }

    public function findMin()
    {

        if (count($this->lockNodes) == count($this->graph))
            throw new RuntimeException(sprintf('terminated'));

        $min = [];
        foreach ($this->states as $number => $state) {

            if (in_array($state['coordinate']['node'], $this->lockNodes)) continue;

            $min[$number] = $state['distance'];

        }

        $m = min($min);

        foreach($this->states as $k => $state)
        {
            $node = $this->states[$k]['coordinate']['node'];

            if($state['distance'] == $m && !in_array($node, $this->lockNodes))
            {
                $this->states[$k]['status'] = 1;
                $this->lockNodes[$this->nodes[$node]] = $node;

                return $this->states[$k];
            }
        }



    }

    public function run()
    {

        $this->state();
        $s = $this->findMin();
        while(true)
        {
            $this->state($s['coordinate']['node'], $s['distance']);
            $s = $this->findMin();
        }

        $this->shortWay();

    }

    public function setCodeNode(array $letters)
    {
        $this->nodes = $letters;
    }

    public function shortWay()
    {


    }

}