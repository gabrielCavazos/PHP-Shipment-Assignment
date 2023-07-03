<?php
include "methods.php";

// Read input files
$shipmentsFile = 'shipments.txt';
$driversFile = 'drivers2.txt';

$shipments = file($shipmentsFile, FILE_IGNORE_NEW_LINES);
$drivers = file($driversFile, FILE_IGNORE_NEW_LINES);

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