<?php

declare(strict_types=1);

/*
 * This file is part of the adventofcode project.
 *
 * @author     Andre Smith <smith.cyber@gmail.com>
 * @copyright  Copyright (c) 2017
 */

$input = getInput();

$inputArray = explode("\n", $input);

array_walk($inputArray, function(&$value, $key) {
    $value = (int) $value;
});

$arrayBoundary = count($inputArray) - 1;
$instruction = 0;
$index = 0;
$instructionCount = 0;
while ($index <= $arrayBoundary) {
    $instruction = $inputArray[$index];
    if ($instruction >= 3) {
        $inputArray[$index] -= 1;
    } else {
        $inputArray[$index] += 1;
    }

    $index += $instruction;
    $instructionCount++;
    if ($index < 0 || $index > $arrayBoundary) {
        break;
    }
}
var_dump($inputArray);

return $instructionCount;