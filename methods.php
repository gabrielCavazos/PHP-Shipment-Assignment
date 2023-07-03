<?php

function calculateSuitabilityScore($shipmentName, $driverName)
{
    $shipmentLength = strlen($shipmentName);
    $driverLength = strlen($driverName);

    // Calculate base suitability score
    if ($shipmentLength % 2 == 0) {
        $baseSS = countVowels($driverName) * 1.5;
    } else {
        $baseSS = countConsonants($driverName);
    }

    // Check for common factors and increase SS if found
    if (hasCommonFactors($shipmentLength, $driverLength)) {
        $baseSS *= 1.5;
    }

    return $baseSS;
}

function countVowels($str)
{
    $vowels = array('a', 'e', 'i', 'o', 'u');
    $count = 0;
    foreach (str_split(mb_strtolower($str)) as $char) {
        if (in_array($char, $vowels)) {
            $count++;
        }
    }
    return $count;
}

function countConsonants($str)
{
    $consonants = array('b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z');
    $count = 0;
    foreach (str_split(mb_strtolower($str)) as $char) {
        if (in_array($char, $consonants)) {
            $count++;
        }
    }
    return $count;
}

function hasCommonFactors($a, $b)
{
    $factorsA = getFactors($a);
    $factorsB = getFactors($b);
    $commonFactors = array_intersect($factorsA, $factorsB);
    return count($commonFactors) > 0;
}

function getFactors($number)
{
    $factors = array();
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i == 0) {
            $factors[] = $i;
        }
    }
    return $factors;
}
function assignShipmentsToDrivers($shipments, $drivers)
{
    $totalSS = 0;
    $assignment = array();
    $usedDrivers = array_fill(0, count($drivers), false);

    backtrack($shipments, $drivers, $usedDrivers, $assignment, 0, 0, $totalSS);

    return array('totalSS' => $totalSS, 'assignment' => $assignment);
}

function backtrack($shipments, $drivers, &$usedDrivers, &$assignment, $shipmentIndex, $currentSS, &$maxSS)
{
    if ($shipmentIndex >= count($shipments)) {
        if ($currentSS > $maxSS) {
            $maxSS = $currentSS;
            $assignment = $usedDrivers;
        }
        return;
    }

    for ($i = 0; $i < count($drivers); $i++) {
        if (!$usedDrivers[$i]) {
            $usedDrivers[$i] = true;
            $ss = calculateSuitabilityScore($shipments[$shipmentIndex], $drivers[$i]);
            backtrack($shipments, $drivers, $usedDrivers, $assignment, $shipmentIndex + 1, $currentSS + $ss, $maxSS);
            $usedDrivers[$i] = false;
        }
    }
}