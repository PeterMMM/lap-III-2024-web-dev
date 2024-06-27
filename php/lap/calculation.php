<?php
// Calculate the sum of two numbers
$number1 = 10;
$number2 = 5;
$sum = $number1 + $number2;
echo "The sum of $number1 and $number2 is: $sum\n";
echo '<br/>';

// Calculate the square root of a given number
$number = 25;
$squareRoot = sqrt($number);
echo "The square root of $number is: $squareRoot\n";
echo '<br/>';

// Find the remainder of dividing two numbers
$dividend = 20;
$divisor = 7;
$remainder = $dividend % $divisor;
echo "The remainder of dividing $dividend by $divisor is: $remainder\n";
echo '<br/>';

// Convert temperature from Celsius to Fahrenheit
$celsius = 30;
$fahrenheit = ($celsius * 9/5) + 32;
echo "$celsius degrees Celsius is equal to $fahrenheit degrees Fahrenheit\n";
echo '<br/>';

// Generate a random number between 1 and 10
$randomNumber = rand(1, 10);
echo "Random number between 1 and 10: $randomNumber\n";
?>
