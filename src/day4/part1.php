<?php

declare(strict_types=1);
/*
 * This file is part of the adventofcode project.
 *
 * @author     Andre Smith <smith.cyber@gmail.com>
 * @copyright  Copyright (c) 2017
 */

$input = getInput();

$total = 0;

foreach (explode("\n", $input) as $passPhrase) {
    $array = explode(' ', $passPhrase);
    $total += (count($array) === count(array_unique($array)));
}

return $total;