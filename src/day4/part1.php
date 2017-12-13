<?php

declare(strict_types=1);
/*
 * This file is part of the adventofcode project.
 *
 * @author     Andre Smith <smith.cyber@gmail.com>
 * @copyright  Copyright (c) 2017
 */

$input = getInput();

return count(array_filter(explode("\n", $input), function ($passphrase) {
    $words = explode(' ', $passphrase);

    return count(array_unique($words)) === count($words);
}));
