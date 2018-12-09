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

$results = ['2' => 0, '3' => 0];
$found2 = false;
$found3 = false;
foreach ($input as $code) {
    foreach (count_chars($code, 1) as $str => $val) {
        if (!$found2 && $val === 2) {
            $results['2'] += 1;
            $found2 = true;
        }
        if (!$found3 && $val === 3) {
            $results ['3'] += 1;
            $found3 = true;
        }
    }
    $found2 = $found3 = false;
}

return $results['2'] * $results['3'];
