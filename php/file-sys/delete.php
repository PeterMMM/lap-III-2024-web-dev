<?php
// Delete a file
$filename = "newfile.txt";
if (file_exists($filename)) {
    if (unlink($filename)) {
        echo "File deleted successfully.<br>";
    } else {
        echo "Failed to delete file.<br>";
    }
} else {
    echo "File does not exist.<br>";
}
?>
