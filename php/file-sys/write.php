<?php
// Open file for writing
$file = fopen("newfile.txt", "w");
if ($file) {
    $content = "Hello, this is some text to write into the file.";
    fwrite($file, $content);
    echo "Data written to file successfully.<br>";
    fclose($file);
} else {
    echo "Failed to open file.<br>";
}
?>
