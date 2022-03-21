<?php

function countWithoutPoint($array, $point)
{
    $count = 0;
    foreach ($array as $element) {
        if ($element !== $point) {
            $count++;
        }
    }
    return $count;
}

function solution($A, $B, $N)
{
    $graph = [];
    for ($i = 0, $length = count($A); $i < $length; $i++) {
        $graph[$A[$i]][] = $B[$i];
        $graph[$B[$i]][] = $A[$i];
    }

    $maxRank = 0;
    $points = [];
    for ($i = 0, $length = count($A); $i < $length; $i++) {
        $rank = count($graph[$A[$i]]) + countWithoutPoint($graph[$B[$i]], $A[$i]);
        if ($rank > $maxRank) {
            $maxRank = $rank;
            $points = [$A[$i], $B[$i]];

        }
    }
    print_r($points);
    return $maxRank;
}
