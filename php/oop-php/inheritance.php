<?php
class Animal {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function eat() {
        echo $this->name . " is eating. 🍽️<br>";
    }

    public function makeSound() {
        echo $this->name . " is making a sound. 🐾<br>";
    }
}

class Chicken extends Animal {
    public function __construct($name) {
        parent::__construct($name);
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
        echo "The egg contains a baby chick. 🐥<br>";
    }
}

$chicken = new Chicken("ဘိုကြက်");
$chicken->eat(); // Inherited from Animal
$chicken->makeSound(); // Inherited from Animal

$egg = $chicken->layEgg();
$egg->setSize("Small");
$egg->setColor("Brown");

$egg->getContents();
