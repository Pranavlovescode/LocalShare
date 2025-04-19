<?php
$targetDir = "uploads/";
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

$file = $_FILES["file"];
$originalName = basename($file["name"]);
$uniqueName = uniqid() . "-" . $originalName;
$targetPath = $targetDir . $uniqueName;

if (move_uploaded_file($file["tmp_name"], $targetPath)) {
    $meta = file_exists("files.json") ? json_decode(file_get_contents("files.json"), true) : [];
    $meta[] = [
        "name" => $originalName,
        "unique" => $uniqueName,
        "time" => time()
    ];
    file_put_contents("files.json", json_encode($meta, JSON_PRETTY_PRINT));
    header("Location: index.php");
} else {
    echo "❌ Failed to upload file.";
}
?>
