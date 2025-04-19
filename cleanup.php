<?php
$files = file_exists("files.json") ? json_decode(file_get_contents("files.json"), true) : [];
$updated = [];
$now = time();
$expirySeconds = 3600; // 1 hour

foreach ($files as $file) {
    $path = "uploads/" . $file["unique"];
    if (file_exists($path)) {
        if ($now - $file["time"] < $expirySeconds) {
            $updated[] = $file;
        } else {
            unlink($path);
        }
    }
}

file_put_contents("files.json", json_encode($updated, JSON_PRETTY_PRINT));
?>
