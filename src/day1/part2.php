<?php
/*
 * This file is part of the adventofcode project.
 *
 * @author     Andre Smith <smith.cyber@gmail.com>
 * @copyright  Copyright (c) 2017
 */

declare(strict_types=1);

$input = str_split((string) getInput());

$steps = count($input) / 2;
$sum = 0;
foreach ($input as $index => $value) {
    $compareValue = $input[($index + $steps) % count($input)];
    if ($value === $compareValue) {
        $sum += $compareValue;
    }
}

return $sum;