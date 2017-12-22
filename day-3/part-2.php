<?php

$grid['0,0'] = 1;
$x = 0;
$y = 0;

increaseX($x, $y, $grid);

function increaseX($x, $y, &$grid)
{
    $newX = $x + 1;
    $pos = $newX . "," . $y;
    if (!array_key_exists($pos, $grid)) {
        $grid[$pos] = storeSum($pos, $grid);
        return increaseY($newX, $y, $grid);
    }
    decreaseY($x, $y, $grid);
}

function storeSum($coords, array $grid)
{
    $pos = explode(',', $coords);
    $neighbourhoodTotal = [];
    $neighbourhoodTotal[] = getCoordValue(($pos[0]+1).','.($pos[1]), $grid);
    $neighbourhoodTotal[] = getCoordValue(($pos[0]+1).','.($pos[1]+1), $grid);
    $neighbourhoodTotal[] = getCoordValue(($pos[0]).','.($pos[1]+1), $grid);
    $neighbourhoodTotal[] = getCoordValue(($pos[0]-1).','.($pos[1]+1), $grid);
    $neighbourhoodTotal[] = getCoordValue(($pos[0]-1).','.($pos[1]), $grid);
    $neighbourhoodTotal[] = getCoordValue(($pos[0]-1).','.($pos[1]-1), $grid);
    $neighbourhoodTotal[] = getCoordValue(($pos[0]).','.($pos[1]-1), $grid);
    $neighbourhoodTotal[] = getCoordValue(($pos[0]+1).','.($pos[1]-1), $grid);

    $newTotal = array_sum($neighbourhoodTotal);

    if (325489 <= $newTotal) {
        echo "BAM! -> " . $newTotal . "\n";
        exit;
    }

    return $newTotal;
}

function getCoordValue($pos, $grid)
{
    if (array_key_exists($pos, $grid)) {
        return $grid[$pos];
    }
}

function increaseY($x, $y, &$grid)
{
    $newY = $y + 1;
    $pos = $x . "," . $newY;
    if (!array_key_exists($pos, $grid)) {
        $grid[$pos] = storeSum($pos, $grid);
        return decreaseX($x, $newY, $grid);
    }
    increaseX($x, $y, $grid);
}

function decreaseX($x, $y, &$grid)
{
    $newX = $x - 1;
    $pos = $newX . "," . $y;
    if (!array_key_exists($pos, $grid)) {
        $grid[$pos] = storeSum($pos, $grid);
        return decreaseY($newX, $y, $grid);
    }
    increaseY($x, $y, $grid);
}

function decreaseY($x, $y, &$grid)
{
    $newY = $y - 1;
    $pos = $x . "," . $newY;
    if (!array_key_exists($pos, $grid)) {
        $grid[$pos] = storeSum($pos, $grid);
        return increaseX($x, $newY, $grid);
    }
    decreaseX($x, $y, $grid);
}
