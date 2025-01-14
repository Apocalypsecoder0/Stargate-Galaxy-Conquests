<?php
// Include the interface file
include 'interface.php';

// Class that implements the Character interface
class PlayerCharacter implements Character {
    private $name;
    private $race;
    private $class;

    // Constructor to initialize character properties
    public function __construct($name, $race, $class) {
        $this->name = $name;
        $this->race = $race;
        $this->class = $class;
    }

    // Implementing the getName method
    public function getName() {
        return $this->name;
    }

    // Implementing the getRace method
    public function getRace() {
        return $this->race;
    }

    // Implementing the getClass method
    public function getClass() {
        return $this->class;
    }

    // Implementing the displayDetails method
    public function displayDetails() {
        echo "Name: " . $this->getName() . "<br>";
        echo "Race: " . $this->getRace() . "<br>";
        echo "Class: " . $this->getClass() . "<br>";
    }
}

// Example usage
$character = new PlayerCharacter("Aragorn", "Human", "Ranger");
$character->displayDetails();
?>
