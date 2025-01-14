<?php
// empire_functions.php

// Sample data for demonstration purposes
$resources = [
    'gold' => 1000,
    'food' => 500,
    'wood' => 300,
];

$fleet = [
    'fighters' => 10,
    'bombers' => 5,
    'transports' => 3,
];

// Function to get current resources
function getResources() {
    global $resources;
    return $resources;
}

// Function to add resources
function addResources($gold, $food, $wood) {
    global $resources;
    $resources['gold'] += $gold;
    $resources['food'] += $food;
    $resources['wood'] += $wood;
    return "Resources updated: Gold: {$resources['gold']}, Food: {$resources['food']}, Wood: {$resources['wood']}";
}

// Function to get fleet details
function getFleetDetails() {
    global $fleet;
    return $fleet;
}

// Function to add to the fleet
function addToFleet($shipType, $quantity) {
    global $fleet;
    if (array_key_exists($shipType, $fleet)) {
        $fleet[$shipType] += $quantity;
        return "$quantity $shipType(s) added to the fleet.";
    } else {
        return "Invalid ship type.";
    }
}

// Function to upgrade a building (for demonstration)
function upgradeBuilding($buildingType) {
    // Here you would typically check resources and upgrade logic
    return "Upgrading $buildingType building.";
}
?>
