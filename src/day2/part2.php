<?php

/*
 * This file is part of the adventofcode project.
 *
 * @author     Andre Smith <smith.cyber@gmail.com>
 * @copyright  Copyright (c) 2017
 */

declare(strict_types=1);

$input = explode("\n", getInput());
$sum = 0;

foreach ($input as $row) {
    preg_match_all('!\d+!', $row, $matches);
    for ($a = 0; $a < count($matches[0]); $a++) {
        for ($b = 0; $b < count($matches[0]); $b++) {
            if ($a === $b) {
                continue;
            }

            $value = $matches[0][$a];
            $divisor = $matches[0][$b];

            if ($divisor % $value === 0) {
                $sum += $divisor / $value;
            }
        }
    }
}

return $sum;