<?php
if (!isset($_GET["file"])) {
    die("File not specified.");
}

$filename = basename($_GET["file"]);
$filepath = "uploads/" . $filename;

if (file_exists($filepath)) {
    header("Content-Description: File Transfer");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\"");
    header("Content-Length: " . filesize($filepath));
    readfile($filepath);
    exit;
} else {
    echo "File not found.";
}
?>
