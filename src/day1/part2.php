<?php

declare(strict_types=1);

/*
 * This file is part of the adventofcode project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

$input = str_split((string) getInput());

$sum = 0;
$check = count($input) / 2;

foreach ($input as $key => $value) {
    if (isset($input[$key + $check])) {
        if ($value === $input[$key + $check]) {
            $sum += ($value);
        }
    } else {
        $index = ($key + $check) - count($input);
        if ($value === $input[$index]) {
            $sum += $value;
        }
    }
}

return $sum;