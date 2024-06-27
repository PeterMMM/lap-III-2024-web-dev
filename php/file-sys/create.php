<?php
// Create and open a file for writing
$file = fopen("newfile.txt", "w");
if ($file) {
    echo "File created successfully.<br>";
    fclose($file);  // Always close the file when you're done
} else {
    echo "Failed to create file.<br>";
}
?>
