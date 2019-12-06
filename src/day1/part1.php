<?php
/*
 * This file is part of the adventofcode project.
 *
 * @author     Andre Smith <smith.cyber@gmail.com>
 * @copyright  Copyright (c) 2017
 */

declare(strict_types=1);

$input = explode("\n", getInput());

$array = [];
foreach ($input as $value) {
    if (!empty($value)) {
        $array[] = floor($value / 3) - 2 ;
    }
}

return (int) array_sum($array);
