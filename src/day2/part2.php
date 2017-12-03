<?php

declare(strict_types=1);

/*
 * This file is part of the adventofcode project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

$input = getInput();

$checksum = 0;

foreach (explode("\n", $input) as $line) {
    preg_match_all('/[0-9]+/', $line, $cols);

    for ($i = 0; $i < count($cols[0]); $i++) {
        for ($j = 0; $j < count($cols[0]); $j++) {
            if ($i === $j) {
                continue;
            }

            $a = $cols[0][$i];
            $b = $cols[0][$j];

            if (0 === $a % $b) {
                $checksum += $a / $b;
            }
        }
    }
}

return $checksum;