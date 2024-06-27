<?php
class Chicken {
    public $name;        // 🐔 Public variable
    private $age;        // 🔒 Private variable
    protected $color;    // 🔒 Protected variable

    public function __construct($name, $age, $color) {
        $this->name = $name;
        $this->age = $age;
        $this->color = $color;
    }

    public function layEgg() {
        $egg = new Egg($this->color);
        echo $this->name . " laid an egg with " . $egg->getColor() . " color. 🥚<br>";
    }
}

class Egg {
    protected $color;

    public function __construct($color) {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }
}

$chicken = new Chicken("ဘိုကြက်", 2, "Brown");
$chicken->name = "ဘိုကြက်";    // Public variable can be accessed and modified

echo $chicken->name . " 🐓<br>";    // Output: ဘိုကြက် 🐓
// echo $chicken->age . "<br>";        // Error: Private variable cannot be accessed directly
// echo $chicken->color . "<br>";      // Error: Protected variable cannot be accessed directly

$chicken->layEgg();    // Output: Henry laid an egg with Brown color. 🥚
