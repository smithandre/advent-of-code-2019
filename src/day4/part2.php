<?php
/*
 * This file is part of the adventofcode project.
 *
 * @author     Andre Smith <smith.cyber@gmail.com>
 * @copyright  Copyright (c) 2017
 */

declare(strict_types=1);

$input = getInput();

$inputRow = explode("\n", $input);
$total = 0;

foreach ($inputRow as $passPhrase) {
    $passPhraseWords = explode(' ', $passPhrase);
    array_walk($passPhraseWords, function (&$value, $key) {
        $wordArray = str_split($value);
        sort($wordArray);
        $value = implode('', $wordArray);
    });

    $total += (count($passPhraseWords) === count(array_unique($passPhraseWords)));
}

return $total;