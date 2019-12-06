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
        $totalFuelNeeded = 0;
        $moduleFuel = $totalFuelNeeded = floor($value / 3) - 2;
        while ($moduleFuel > 0) {
            $moduleFuel = floor($moduleFuel / 3) - 2;
            $totalFuelNeeded = $moduleFuel > 0 ? $totalFuelNeeded + $moduleFuel : $totalFuelNeeded;
        }
        $array[] = $totalFuelNeeded;
    }
}

return (int) array_sum($array);
