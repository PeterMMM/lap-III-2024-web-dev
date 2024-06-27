<?php
interface Vehicle {
    public function start();
    public function stop();
}

abstract class AbstractVehicle {
    public function accelerate() {
        echo "Accelerating the vehicle.<br>";
    }
    public abstract function brake();
}

class Car implements Vehicle {
    public function start() {
        echo "Starting the car engine.<br>";
    }
    public function stop() {
        echo "Stopping the car engine.<br>";
    }
    public function accelerate() {
        echo "Accelerating the car.<br>";
    }
}

class Bicycle extends AbstractVehicle {
    public function brake() {
        echo "Applying brakes to the bicycle.<br>";
    }
}

$car = new Car();
$car->start();
$car->accelerate();
$car->stop();

$bicycle = new Bicycle();
$bicycle->accelerate();
$bicycle->brake();
