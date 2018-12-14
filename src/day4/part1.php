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

usort($input, function ($a, $b) {

    preg_match_all("/\[(.*?)\](.*)/", $a, $matchesA);
    preg_match_all("/\[(.*?)\](.*)/", $b, $matchesB);

    return strtotime($matchesA[1][0]) <=> strtotime($matchesB[1][0]) ;
});

$data = [];
$guardId = 0;
foreach ($input as $guardDetails) {
    preg_match_all("/\[(.*?)\](.*)/", $guardDetails, $matches);

    $containsId = preg_match("/(\d+)/", $matches[2][0], $rawGuardId);

    if ($containsId) {
        $guardId = $rawGuardId[0];
        continue;
    }
    
    list($date, $time) = explode(' ', $matches[1][0]);
    if (trim($matches[2][0]) === "falls asleep") {
        $start = date('i', strtotime($time));
    }

    if (trim($matches[2][0]) === "wakes up") {
        $end = date('i', strtotime($time)) - 1;
    }

    if (!empty($start) && !empty($end)) {
        //var_dump(range($start, $end));
        $data[$guardId] = !empty($data[$guardId]) ? array_merge($data[$guardId], range($start, $end)) : range($start, $end);
        $start = $end = null;
    }
}

$mostSleepingGuard = null;
$maxCount = 0;
foreach ($data as $id => $sleepingPattern) {
    $count = count($sleepingPattern);
    if ($maxCount < $count) {
        $mostSleepingGuard = $id;
        $maxCount = $count;
    }
}

$counts = array_count_values($data[$mostSleepingGuard]);

$maxSleep = array_keys($counts, max($counts));

return $maxSleep[0] * $mostSleepingGuard;
