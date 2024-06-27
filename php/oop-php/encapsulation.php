<?php
class Animal {
    private $name;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function eat() {
        echo $this->name . " is eating. 🍽️<br>";
    }
}

class Chicken extends Animal {
    public function layEgg() {
        echo $this->getName() . " laid an egg! 🥚<br>";
        return new Egg();
    }

    public function cluck() {
        echo $this->getName() . " is clucking. 🐔<br>";
    }
}

class Egg {
    private $size;
    private $color;

    public function getSize() {
        return $this->size;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function hatch() {
        echo "The egg hatched into a new chicken! 🐣<br>";
        return new Chicken();
    }

    public function getContents() {
        echo "The egg contains a baby chick. 🐥<br>";
    }
}

$chicken = new Chicken();
$chicken->setName("ဘိုကြက်");

$chicken->eat(); // Inherited from Animal class
$chicken->cluck();

$egg = $chicken->layEgg();
$egg->setSize("Small");
$egg->setColor("Brown");

$egg->getContents();

$newChicken = $egg->hatch();
$newChicken->setName("ကြက်ပေါက်");

$newChicken->eat();
$newChicken->cluck();
