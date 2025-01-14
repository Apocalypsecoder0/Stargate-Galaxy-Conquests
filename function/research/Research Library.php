<?php

class OGameResearchLibrary {
    private $technologies = [];
    private $resources = [];

    public function __construct($resources) {
        $this->resources = $resources;
        $this->initializeTechnologies();
    }

    private function initializeTechnologies() {
        // Example technologies with their requirements and costs
        $this->technologies = [
            'Energy Technology' => [
                'cost' => ['metal' => 200, 'crystal' => 100, 'deuterium' => 50],
                'time' => 30, // in minutes
                'requirements' => []
            ],
            'Plasma Technology' => [
                'cost' => ['metal' => 500, 'crystal' => 300, 'deuterium' => 100],
                'time' => 60,
                'requirements' => ['Energy Technology']
            ],
            // Add more technologies as needed
        ];
    }

    public function researchTechnology($techName) {
        if (!isset($this->technologies[$techName])) {
            return "Technology not found.";
        }

        $tech = $this->technologies[$techName];

        // Check requirements
        foreach ($tech['requirements'] as $req) {
            if (!isset($this->technologies[$req]['unlocked']) || !$this->technologies[$req]['unlocked']) {
                return "You need to unlock " . $req . " first.";
            }
        }

        // Check if enough resources are available
        foreach ($tech['cost'] as $resource => $amount) {
            if ($this->resources[$resource] < $amount) {
                return "Not enough " . $resource . ". You need " . $amount . ".";
            }
        }

        // Deduct resources
        foreach ($tech['cost'] as $resource => $amount) {
            $this->resources[$resource] -= $amount;
        }

        // Start research (simulated)
        $this->technologies[$techName]['unlocked'] = true; // Mark technology as unlocked
        $completionTime = time() + ($tech['time'] * 60); // Calculate completion time in seconds

        return "Researching " . $techName . " for " . $tech['time'] . " minutes. Completion time: " . date('Y-m-d H:i:s', $completionTime);
    }

    public function getResources() {
        return $this->resources;
    }

    public function getTechnologies() {
        return $this->technologies;
    }
}

// Example usage
$resources = [
    'metal' => 500,
    'crystal' => 300,
    'deuterium' => 150,
];

$researchLibrary = new OGameResearchLibrary($resources);

// Research Energy Technology
echo $researchLibrary->researchTechnology('Energy Technology') . "\n";

// Check remaining resources
print_r($researchLibrary->getResources());

// Research Plasma Technology (after unlocking Energy Technology)
echo $researchLibrary->researchTechnology('Plasma Technology') . "\n";

// Check remaining resources again
print_r($researchLibrary->getResources());
?>
