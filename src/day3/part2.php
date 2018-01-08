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

$matrix[0][0] = 1;
$xPos = 1;
$yPos = 0;
$sum = 0;

$direction = 'r';
for ($i = 1; $i <= $input; $i++) {

    if ($direction === 'r') {
        $sum = ($matrix[$xPos - 1][$yPos] ?? 0)
            + ($matrix[$xPos - 1][$yPos + 1] ?? 0)
            + ($matrix[$xPos][$yPos - 1] ?? 0)
            + ($matrix[$xPos + 1][$yPos + 1] ?? 0)
            + ($matrix[$xPos][$yPos + 1] ?? 0);
        $matrix[$xPos][$yPos] = $sum;

        if ($xPos === $maxX + 1) {
            $direction = 'u';
            $maxX += 1;
            continue;
        }
        $xPos += 1;
    }

    if ($direction === 'u') {
        $sum = ($matrix[$xPos][$yPos - 1] ?? 0)
            + ($matrix[$xPos - 1][$yPos - 1] ?? 0)
            + ($matrix[$xPos - 1][$yPos] ?? 0)
            + ($matrix[$xPos - 1][$yPos + 1] ?? 0);
        $matrix[$xPos][$yPos] = $sum;

        if ($yPos === $maxY + 1) {
            $direction = 'l';
            $maxY += 1;
            continue;
        }
        $yPos += 1;
    }

    if ($direction === 'l') {
        $sum = ($matrix[$xPos + 1][$yPos] ?? 0)
            + ($matrix[$xPos + 1][$yPos - 1] ?? 0)
            + ($matrix[$xPos][$yPos - 1] ?? 0)
            + ($matrix[$xPos - 1][$yPos - 1] ?? 0);

        $matrix[$xPos][$yPos] = $sum;
        if ($xPos === $minX - 1) {
            $direction = 'd';
            $minX -= 1;
            continue;
        }
        $xPos -= 1;
    }

    if ($direction === 'd') {
        $sum = ($matrix[$xPos][$yPos + 1] ?? 0)
            + ($matrix[$xPos + 1][$yPos + 1] ?? 0)
            + ($matrix[$xPos + 1][$yPos] ?? 0)
            + ($matrix[$xPos + 1][$yPos - 1] ?? 0);

        $matrix[$xPos][$yPos] = $sum;
        if ($yPos === $minY - 1) {
            $direction = 'r';
            $minY -= 1;
            continue;
        }
        $yPos -= 1;
    }

    if ($sum > $input) {
        break;
    }

}

var_dump($matrix);

return $sum;