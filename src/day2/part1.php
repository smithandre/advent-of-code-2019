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
    $checksum += max($cols[0]) - min($cols[0]);
}

return $checksum;