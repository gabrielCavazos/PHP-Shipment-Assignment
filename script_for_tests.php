<?php
include "methods.php";

// Read input files
$shipmentsFile = 'shipments3.txt';
$driversFile = 'drivers3.txt';

$shipments = file($shipmentsFile, FILE_IGNORE_NEW_LINES);
$drivers = file($driversFile, FILE_IGNORE_NEW_LINES);

echo "Shipment-Driver ss:" . PHP_EOL;
foreach ($shipments as $key => $s) {
    foreach ($drivers as $key => $d) {
        
        echo $s . " - " . $d." - ". calculateSuitabilityScore($s,$d) . PHP_EOL;

    }
}

// Assign shipments to drivers
$result = assignShipmentsToDrivers($shipments, $drivers);

// Output total SS and shipment-driver assignment
echo "Total Suitability Score: " . $result['totalSS'] . PHP_EOL;
echo "Shipment-Driver Assignment:" . PHP_EOL;
foreach ($result['assignment'] as $shipmentIndex => $isAssigned) {
    if ($isAssigned) {
        echo $shipments[$shipmentIndex] . " - " . $drivers[$shipmentIndex] . PHP_EOL;
    }
}