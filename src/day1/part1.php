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
array_walk($input, function ($value) use (&$sum) {
    $sum += (int) $value;
});

return $sum;
