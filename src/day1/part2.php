<?php
/*
 * This file is part of the adventofcode project.
 *
 * @author     Andre Smith <smith.cyber@gmail.com>
 * @copyright  Copyright (c) 2017
 */

declare(strict_types=1);

$input = explode("\n", getInput());
unset($input[count($input) - 1]);
$sum = 0;
$result = [];
$found = '';
while($found === '') {
    array_walk($input, function ($value, $key) use (&$sum, &$result, &$found) {
        if ($found === '') {
            $duplicates = in_array($sum, $result);

            if ($duplicates) {
                $found = $sum;
            } else {
                $result[] = $sum;
                $sum += (int) $value;
            }
        }
    });
    unset($result[count($result) - 1]);
}

return $found;
