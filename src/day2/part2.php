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

$candidate = [];
$smallestDifference = 5;
$resultString = '';
foreach ($input as $key => $code) {
    $baseArray = str_split($code);
    for ($a = $key + 1; $a < count($input); ++$a) {
        $comparing = str_split($input[$a]);
        $result = array_diff_assoc($baseArray, $comparing);
        $charDiffCount = count($result);
        if ($charDiffCount < $smallestDifference) {
            //echo "Base $code\n";
            //echo "Candidate $input[$a]\n";
            //echo "Count $charDiffCount\n\n";
            if (count($candidate) > 0) {
                $candidate = [];
            }
            $candidate[implode('', $baseArray)] = $result;
            $smallestDifference = $charDiffCount;
        }
    }
    //$smallestDifference = 7;
}
$candidate[key($candidate)] = array_reverse($candidate[key($candidate)], true);
$resultString = key($candidate);

foreach ($candidate[key($candidate)] as $key => $value) {
    $resultString = substr_replace($resultString, '', $key, 1);
}

return $resultString;


// nfdsvwjyteogmbzuchinkx
// nfqdsvwjyteogmbzuchinkpx



// pnfqdsvwjyteogqmbzuchinkpx
// ynfqdsvwjyteogdmbzuchinkpx
//  nfqdsvwjyteogmbzuchinkpx
