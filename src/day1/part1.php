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

foreach ($input as $key => $value) {
    if (isset($input[$key + 1])) {
        if ($value === $input[$key + 1]) {
            $sum += $value;
        }
    } else if ($value === $input[0]) {
        $sum += $value;
    }
}

return $sum;