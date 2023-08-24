<?php
class ObstructionDetector {
    private $speed;
    private $distance;

    public function __construct($speed, $distance) {
        $this->speed = $speed;
        $this->distance = $distance;
    }

    /**
    * Calculate the expected time to travel from point
    * A to point B based on speed and distance
    */ 
    
    public function calculateExpectedTime(){
        $expectedTimeHours = $this->distance / $this->speed;
        $expectedTimeMinutes = $expectedTimeHours * 60;

        return $expectedTimeMinutes;
    }

    /**
     * Check for obstructions and determine if they are
     * impenetrable based on actual time taken
     */

    public function checkObstructions($actualTime) {
        $expectedTime = $this->calculateExpectedTime();
        $timeDifference = $actualTime - $expectedTime;

        if($timeDifference > 60){
            return true; // Impenetrable obstruction
        }else {
            return false; // Non-impenetrable obstruction
        }
    }

}

/**
 * Simulated values gotten from another module  
 */ 

 $machineSpeed = 20; // miles per hour
 $distance_A_B = 10; // miles
 $actualTravelTime = 78; // minutes

 // Creating an instance of the ObstructionDetector class
 $diggingModule = new ObstructionDetector($machineSpeed, $distance_A_B);

 // Check for obstructions and impenetrable obstructions
 $obstructionResult = $diggingModule->checkObstructions($actualTravelTime);

 // Display the result based on obstruction detection
 if($obstructionResult){
    echo "There is na obstruction, and it's impenetrable";
 } else {
    echo "No obstruction";
 }

?>