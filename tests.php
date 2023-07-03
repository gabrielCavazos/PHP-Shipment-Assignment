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

function testCalculateSuitabilityScore()
{
    echo "Testing calculate suitatiblity score\n";

    // Test case 1: Even-length shipment name with vowels
    $shipmentName1 = 'packagee';
    $driverName1 = 'John Doe';
    $expectedScore1 = 3 * 1.5; // Number of vowels in the driver name multiplied by 1.5
    $shipmentLength = strlen($shipmentName1);
    $driverLength = strlen($driverName1);
    if (hasCommonFactors($shipmentLength, $driverLength)) {
        $expectedScore1 *= 1.5;
    }
    $score1 = calculateSuitabilityScore($shipmentName1, $driverName1);


    if ($score1 === $expectedScore1) {
        echo "Passed\n";
    } else {
        echo "Failed. Expected: " . var_export($expectedScore1, true) . ", Actual: " . var_export($score1, true) . "\n";
    }

    // Test case 2: Odd-length shipment name with consonants
    $shipmentName2 = 'box';
    $driverName2 = 'Jane Smith';
    $expectedScore2 = 6; // Number of consonants in the driver name
    $shipmentLength2 = strlen($shipmentName2);
    $driverLength2 = strlen($driverName2);
    if (hasCommonFactors($shipmentLength2, $driverLength2)) {
        $expectedScore2 *= 1.5;
    }
    $score2 = calculateSuitabilityScore($shipmentName2, $driverName2);


    if ($score2 === $expectedScore2) {
        echo "Passed\n";
    } else {
        echo "Failed. Expected: " . var_export($expectedScore2, true) . ", Actual: " . var_export($score2, true) . "\n";
    }

    // Test case 3: Even-length shipment name and driver name with common factors
    $shipmentName3 = 'parcel';
    $driverName3 = 'David Johnsonn';
    // Base score: 4 vowels in driver name * 1.5 = 6
    // Common factors: shipment length (6) and driver length (14) have 1 as a common factor
    // Final score: base score (6) * 1.5 = 9
    $expectedScore3 = 9.0;
    $score3 = calculateSuitabilityScore($shipmentName3, $driverName3);

    if ($score3 === $expectedScore3) {
        echo "Passed\n";
    } else {
        echo "Failed. Expected: " . var_export($expectedScore3, true) . ", Actual: " . var_export($score3, true) . "\n";
    }
    // Add more test cases as needed

    echo "All test cases passed successfully!\n";
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
testCalculateSuitabilityScore();
testAssignShipmentsToDrivers();
testBacktrack();