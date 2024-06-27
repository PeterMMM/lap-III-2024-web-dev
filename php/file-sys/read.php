<?php
// Open file for reading
$file = fopen("newfile.txt", "r");
if ($file) {
    $content = fread($file, filesize("newfile.txt"));
    echo "File content: " . $content . "<br>";
    fclose($file);
} else {
    echo "Failed to read file.<br>";
}
?>
