<?php
/*
 * This file is part of the adventofcode project.
 *
 * @author     Andre Smith <smith.cyber@gmail.com>
 * @copyright  Copyright (c) 2017
 */

declare(strict_types=1);

$input = (int) getInput();

$minX = 0;
$minY = 0;
$maxX = 0;
$maxY = 0;

$matrix = [];
$xPos = 0;
$yPos = 0;

$direction = 'r';
for ($i = 1; $i <= $input; $i++) {
    $matrix[$xPos][$yPos] = $i;

    if ($input === $i) {
        break;
    }

    if ($direction === 'r') {
        $xPos += 1;
        if ($xPos === $maxX + 1) {
            $direction = 'u';
            $maxX += 1;
            continue;
        }
    }

    if ($direction === 'u') {
        $yPos += 1;
        if ($yPos === $maxY + 1) {
            $direction = 'l';
            $maxY += 1;
            continue;
        }
    }

    if ($direction === 'l') {
        $xPos -= 1;
        if ($xPos === $minX - 1) {
            $direction = 'd';
            $minX -= 1;
            continue;
        }
    }

    if ($direction === 'd') {
        $yPos -= 1;
        if ($yPos === $minY - 1) {
            $direction = 'r';
            $minY -= 1;
            continue;
        }
    }
}

return abs(0 - $xPos) + abs(0 - $yPos);