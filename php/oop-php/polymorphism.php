<?php
class Animal {
    public $name;
  
    public function eat() {
        echo $this->name . " is eating.<br>";
    }
}

class Chicken extends Animal {
    public function layEgg() {
        echo $this->name . " laid an egg!<br>";
        return new Egg();
    }
  
    public function cluck() {
        echo $this->name . " is clucking.<br>";
    }
}

class Egg {
    public $size;
    public $color;
  
    public function hatch() {
        echo "The egg hatched into a new chicken!<br>";
        return new Chicken();
    }
  
    public function getContents() {
        echo "The egg contains a ".$this->size." ".$this->color ." baby chick.<br>";
    }
}

$chicken = new Chicken();
$chicken->name = "ဘိုကြက်";

$chicken->eat(); // Inherited from Animal class
$chicken->cluck();

$egg = $chicken->layEgg();
$egg->size = "Small";
$egg->color = "Brown";

$egg->getContents();

$newChicken = $egg->hatch();
$newChicken->name = "ကြက်ပေါက်";

$newChicken->eat();
$newChicken->cluck();
