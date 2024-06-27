<?php
$file_path = '/Applications/XAMPP/xamppfiles/htdocs/lap-php/file-sys/example.txt';

// Example demonstrating various file system functions
ini_set('display_errors', 1);
error_reporting(E_ALL);
// file_exists($filename): Checks if a file or directory exists.
$fileExists = file_exists("example.txt");
echo "File exists: " . ($fileExists ? "Yes" : "No") . "<br>";

// is_file($filename): Checks if a path is a regular file.
$isFile = is_file("example.txt");
echo "Is a file: " . ($isFile ? "Yes" : "No") . "<br>";

// is_dir($filename): Checks if a path is a directory.
$isDir = is_dir("directory");
echo "Is a directory: " . ($isDir ? "Yes" : "No") . "<br>";

// mkdir($dirname): Creates a directory.
$directoryCreated = mkdir("records");
echo "Directory created: " . ($directoryCreated ? "Yes" : "No") . "<br>";

// fopen($filename, $mode): Opens a file or URL.
$file = fopen("example.txt", "r");
if ($file) {
    echo "<br>File opened successfully<br>";
    fclose($file);
} else {
    echo "Failed to open file<br>";
}

// file_get_contents($filename): Reads entire file into a string.
$fileContents = file_get_contents("book1.txt");
echo "File contents: $fileContents<br>";

// file_put_contents($filename, $data): Writes data to a file.
$data = "This is some data";
$fileWritten = file_put_contents("book1.txt", $data);
echo "File written: " . ($fileWritten !== false ? "Yes" : "No") . "<br>";

// unlink($filename): Deletes a file.
$fileDeleted = unlink("example.txt");
echo "File deleted: " . ($fileDeleted ? "Yes" : "No") . "<br>";

// // // rmdir($dirname): Removes a directory.
$directoryRemoved = rmdir("new_directory");
echo "Directory removed: " . ($directoryRemoved ? "Yes" : "No") . "<br>";
?>