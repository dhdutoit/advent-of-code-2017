<?php

$grid = [];
$num = 1;
$x = 0;
$y = 0;

$pos = $x . "," . $y;
if (!in_array($pos, $grid)) {
    $grid[] = $pos;
}

increaseX($x, $y, $num, $grid);

function increaseX($x, $y, &$num, &$grid)
{
    echo $num . "\n";
    $newX = $x + 1;
    $pos = $newX . "," . $y;
    if (!in_array($pos, $grid)) {
        $grid[] = $pos;
        confirmNumber($num, $grid);
        return increaseY($newX, $y, $num, $grid);
    }
    decreaseY($x, $y, $num, $grid);
}

function increaseY($x, $y, &$num, &$grid)
{
    $newY = $y + 1;
    $pos = $x . "," . $newY;
    if (!in_array($pos, $grid)) {
        $grid[] = $pos;
        confirmNumber($num, $grid);
        return decreaseX($x, $newY, $num, $grid);
    }
    increaseX($x, $y, $num, $grid);
}

function decreaseX($x, $y, &$num, &$grid)
{
    $newX = $x - 1;
    $pos = $newX . "," . $y;
    if (!in_array($pos, $grid)) {
        $grid[] = $pos;
        confirmNumber($num, $grid);
        return decreaseY($newX, $y, $num, $grid);
    }
    increaseY($x, $y, $num, $grid);
}

function decreaseY($x, $y, &$num, &$grid)
{
    $newY = $y - 1;
    $pos = $x . "," . $newY;
    if (!in_array($pos, $grid)) {
        $grid[] = $pos;
        confirmNumber($num, $grid);
        return increaseX($x, $newY, $num, $grid);
    }
    decreaseX($x, $y, $num, $grid);
}

function confirmNumber(&$num, $grid)
{
    //my input was = 325489
    //the position in the grid was [-267,-285]
    //manhatten distance was (0-(-267)) + (0-(-285)) = 267 + 285 = 552
    $num++;
    if (325489 == $num) {
        echo "The number reached is " . $num . "\n";
        echo "Position of this number is " . end($grid) . "\n";
        exit;
    }
}
