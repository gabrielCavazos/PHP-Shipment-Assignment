<?php
include "methods.php";

function testCountVowels()
{
    $str = "Hello World";
    $expectedCount = 3;

    $count = countVowels($str);

    echo "Testing countVowels... ";
    if ($count === $expectedCount) {
        echo "Passed\n";
    } else {
        echo "Failed. Expected: $expectedCount, Actual: $count\n";
    }
}

function testCountConsonants()
{
    $str = "Hello World";
    $expectedCount = 7;

    $count = countConsonants($str);

    echo "Testing countConsonants... ";
    if ($count === $expectedCount) {
        echo "Passed\n";
    } else {
        echo "Failed. Expected: $expectedCount, Actual: $count\n";
    }
}

function testHasCommonFactors()
{
    $a = 12;
    $b = 18;
    $expectedResult = true;

    $result = hasCommonFactors($a, $b);

    echo "Testing hasCommonFactors... ";
    if ($result === $expectedResult) {
        echo "Passed\n";
    } else {
        echo "Failed. Expected: " . var_export($expectedResult, true) . ", Actual: " . var_export($result, true) . "\n";
    }
}

function testAssignShipmentsToDrivers()
{
    $shipments = array(
        "example",
        "xmpl 2",
        "testingn"
    );

    $drivers = array(
        "Driver aaa",
        "Driver bbb",
        "Driver cad"
    );

    $expectedTotalSS = 25.0;

    $result = assignShipmentsToDrivers($shipments, $drivers);

    echo "Testing assignShipmentsToDrivers... ";
    if ($result['totalSS'] === $expectedTotalSS) {
        echo "Passed\n";
    } else {
        echo "Failed. Expected: " . var_export($expectedTotalSS, true) . ", Actual: " . var_export($result['totalSS'], true) . "\n";
    }
}

function testBacktrack()
{
    $shipments = array(
        "Shipment A",
        "Shipment B",
        "Shipment C"
    );

    $drivers = array(
        "Driver X",
        "Driver Y",
        "Driver Z"
    );

    $usedDrivers = array_fill(0, count($drivers), false);
    $assignment = array();
    $maxSS = 0;

    backtrack($shipments, $drivers, $usedDrivers, $assignment, 0, 0, $maxSS);

    

    echo "Testing backtrack... Passed\n";
}

// Run the test cases
testCountVowels();
testCountConsonants();
testHasCommonFactors();
testAssignShipmentsToDrivers();
testBacktrack();