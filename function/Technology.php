<?php
class Technology {
    public $name;
    public $requirements;
    public $cost;
    public $researchTime;

    public function __construct($name, $requirements, $cost, $researchTime) {
        $this->name = $name;
        $this->requirements = $requirements;
        $this->cost = $cost;
        $this->researchTime = $researchTime;
    }

    public function displayInfo() {
        echo "Technology: " . $this->name . "\n";
        echo "Requirements: " . implode(", ", $this->requirements) . "\n";
        echo "Cost: " . json_encode($this->cost) . "\n";
        echo "Research Time: " . $this->researchTime . " minutes\n";
    }
}

class ResearchLibrary {
    private $technologies = [];

    public function addTechnology($technology) {
        $this->technologies[] = $technology;
    }

    public function displayTechnologies() {
        foreach ($this->technologies as $tech) {
            $tech->displayInfo();
            echo "-------------------------\n";
        }
    }

    public function researchTechnology($techName, $resources) {
        foreach ($this->technologies as $tech) {
            if ($tech->name === $techName) {
                // Check if requirements are met
                foreach ($tech->requirements as $req) {
                    if (!in_array($req, $resources['unlocked'])) {
                        echo "You need to unlock " . $req . " first.\n";
                        return;
                    }
                }

                // Check if enough resources are available
                foreach ($tech->cost as $resource => $amount) {
                    if ($resources[$resource] < $amount) {
                        echo "Not enough " . $resource . ". You need " . $amount . ".\n";
                        return;
                    }
                }

                // Deduct resources
                foreach ($tech->cost as $resource => $amount) {
                    $resources[$resource] -= $amount;
                }

                echo "Researching " . $tech->name . " for " . $tech->researchTime . " minutes...\n";
                // Simulate research time
                sleep($tech->researchTime); // This is just for simulation; in a real app, you'd handle this differently.
                echo $tech->name . " research completed!\n";
                return;
            }
        }
        echo "Technology not found.\n";
    }
}

// Create technologies
$energyTech = new Technology("Energy Technology", [], ['metal' => 200, 'crystal' => 100, 'deuterium' => 50], 30);
$plasmaTech = new Technology("Plasma Technology", ["Energy Technology"], ['metal' => 400, 'crystal' => 200, 'deuterium' => 100], 60);

// Create research library and add technologies
$researchLibrary = new ResearchLibrary();
$researchLibrary->addTechnology($energyTech);
$researchLibrary->addTechnology($plasmaTech);

// Display available technologies
echo "Available Technologies:\n";
$researchLibrary->displayTechnologies();

// Simulate resources
$resources = [
    'metal' => 500,
    'crystal' => 300,
    'deuterium' => 150,
    'unlocked' => [] // No technologies unlocked yet
];

// Research Energy Technology
$researchLibrary->researchTechnology("Energy Technology", $resources);

// Unlock Energy Technology
$resources['unlocked'][] = "Energy Technology";

// Research Plasma Technology
$researchLibrary->researchTechnology("Plasma Technology", $resources);
?>
