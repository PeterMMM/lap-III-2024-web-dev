<?php

// strlen: Returns the length of a string
$string = "Hello, world!";
echo strlen($string) . "<br>";

// str_replace: Replaces all occurrences of a search string with a replacement string
$search = "world";
$replace = "PHP";
echo str_replace($search, $replace, $string) . "<br>";

// strpos: Returns the position of the first occurrence of a substring
$needle = "world";
echo strpos($string, $needle) . "<br>";

// substr: Returns a part of a string
$start = 7;
$length = 5;
echo substr($string, $start, $length) . "<br>";

// strtolower: Converts a string to lowercase
echo strtolower($string) . "<br>";

// strtoupper: Converts a string to uppercase
echo strtoupper($string) . "<br>";

// trim: Removes whitespace from the beginning and end of a string
$trim_string = "  Hello, world!  ";
echo trim($trim_string) . "<br><br>";

// explode: Splits a string into an array based on a delimiter
$delimiter = ",";
$exploded = explode($delimiter, $string);
echo implode("<br>", $exploded) . "<br><br>";

// implode: Joins elements of an array into a string
$array = ['Hello', 'world!'];
$glue = " ";
echo implode($glue, $array) . "<br>";

// count: Returns the number of elements in an array
echo count($array) . "<br>";

// array_push and array_pop (last element)
array_push($array, "New Element");
echo array_pop($array) . "<br>";

// array_merge and array_combine
$array1 = [1, 2];
$array2 = [3, 4];
$merged = array_merge($array1, $array2);
echo implode("<br>", $merged) . "<br>";
$keys = ['a', 'b'];
$values = [1, 2];
$combined = array_combine($keys, $values);
foreach ($combined as $key => $value) {
    echo "{$key} => {$value}<br>";
}

// array_search
echo array_search("Hello", $array) . "<br>";

// sort and rsort
sort($array);
echo implode("<br>", $array) . "<br>";
rsort($array);
echo implode("<br>", $array) . "<br>";

// array_key_exists
echo array_key_exists('a', $values) ? 'true' : 'false' . "<br>";

// array_unique
$repeated = [1, 1, 2, 2, 3];
$unique = array_unique($repeated);
echo implode("<br>", $unique) . "<br>";

// array_slice
$sliced = array_slice($repeated, 1, 3);
echo implode("<br>", $sliced) . "<br>";

// abs: Returns the absolute value of a number
$number = -42;
echo abs($number) . "<br>";

// sqrt: Returns the square root of a number
echo sqrt(16) . "<br>";

// round: Rounds a number
echo round(3.14159, 2) . "<br>";

// rand: Generates a random number
echo rand(1, 100) . "<br>";

// min and max
echo min(1, 3, 2) . "<br>";
echo max(1, 3, 2) . "<br>";

?>
