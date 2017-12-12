<?php

declare(strict_types=1);

/*
 * This file is part of the adventofcode project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

$input = explode("\n", getInput());
$sum = 0;

foreach ($input as $row) {
    preg_match_all('!\d+!', $row, $matches);
    $sum += (max($matches[0]) - min($matches[0]));
}

return $sum;