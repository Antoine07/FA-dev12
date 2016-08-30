<?php namespace Selection;

class Selection
{
    public function run(array $list)
    {

        $len = count($list);

        for ($i = 0; $i < $len; $i++) {

            $min = $i;
            for($j = ($i+1); $j < $len; $j++)
            {
              if($list[$min] > $list[$j] ) $min = $j;
            }

            if($min != $i) {
                $tmp = $list[$min];
                $list[$min] = $list[$i];
                $list[$i] = $tmp;
            }
        }

        return $list;

    }



}


