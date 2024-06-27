<?php
abstract class Animal {
    protected $name;

    public function setName($name) {
        $this->name = $name;
    }

    public abstract function eat();
    public abstract function makeSound();
}

class Chicken extends Animal {
    public function eat() {
        echo $this->name . " is pecking at the ground. 🍽️<br>";
    }

    public function makeSound() {
        echo $this->name . " is clucking. 🐔<br>";
    }

    public function layEgg() {
        echo $this->name . " laid an egg! 🥚<br>";
        return new Egg();
    }
}

class Egg {
    protected $size;
    protected $color;

    public function setSize($size) {
        $this->size = $size;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getContents() {
        echo "The egg contains a baby chick. 🐥<br> with size ".$this->size." and color ".$this->color;
    }
}

$chicken = new Chicken();
$chicken->setName("ဘိုကြက်");

$chicken->eat(); // Abstract method implementation
$chicken->makeSound(); // Abstract method implementation

$egg = $chicken->layEgg();
$egg->setSize("Small");
$egg->setColor("Brown");

$egg->getContents();
