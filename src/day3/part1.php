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

$claimData = [];
$maxWidth = 0;
$maxHeight = 0;
foreach ($input as $data) {
    $rawData = preg_split('/(@|:)\s*/', str_replace(' ', '', $data));
    $offset = explode(',', $rawData[1]);
    $size = explode('x', $rawData[2]);
    $claimData[$rawData[0]] = ['leftOffset' => $offset[0], 'topOffset' => $offset[1], 'width' => $size[0], 'height' => $size[1]];
}

$fabric = array_fill(0, 1000, array_fill(0, 1000, '.'));

foreach ($claimData as $claimId => $claimDetails) {
    $leftPos = $claimDetails['leftOffset'];
    $topPos = $claimDetails['topOffset'];
    $width = $claimDetails['width'];
    $height = $claimDetails['height'];

    for ($i = $leftPos; $i < $leftPos + $width; ++$i) {
        for($j = $topPos; $j < $topPos + $height; ++$j) {
            $fabric[$i][$j] = $fabric[$i][$j] === '.' ?  $claimId : 'x';
        }
    }
}

$count = 0;
foreach ($fabric as $row) {
    foreach ($row as $piece) {
        if ($piece === 'x') {
            ++$count;
        }
    }
}

return $count;
