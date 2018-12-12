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

    $maxHeight = $maxHeight < $offset[1] + $size[1] ? $offset[1] + $size[1] : $maxHeight;
    $maxWidth = $maxWidth < $offset[0] + $size[0] ? $offset[0] + $size[0] : $maxWidth;
}

$fabric = array_fill(0, $maxWidth, array_fill(0, $maxHeight, '.'));

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

$nonOverlappingClaim = 0;

foreach ($claimData as $claimId => $claimDetails) {
    $leftPos = $claimDetails['leftOffset'];
    $topPos = $claimDetails['topOffset'];
    $width = $claimDetails['width'];
    $height = $claimDetails['height'];

    $overlap = false;

    for ($i = $leftPos; $i < $leftPos + $width; ++$i) {
        for($j = $topPos; $j < $topPos + $height; ++$j) {
            if ($fabric[$i][$j] === 'x') {
                $overlap = true;
                break 2;
            }
        }
    }

    if (!$overlap) {
        return str_replace('#', '', $claimId);
    }
}
