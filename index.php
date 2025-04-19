<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LocalShare – Offline File Sharing</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 p-8">
  <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-xl">
    <h1 class="text-2xl font-bold mb-4 text-center">📤 LocalShare</h1>
    
    <form action="upload.php" method="POST" enctype="multipart/form-data" class="flex flex-col items-center space-y-4">
      <input type="file" name="file" class="border p-2 w-full" required>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Upload File</button>
    </form>

    <hr class="my-6">

    <h2 class="text-lg font-semibold mb-2">Available Files</h2>
    <ul class="list-disc ml-6 text-sm">
    <?php
        // Get the server IP address safely
        if (!empty($_SERVER['SERVER_ADDR'])) {
            $ip = $_SERVER['SERVER_ADDR'];
        } elseif (!empty($_SERVER['HTTP_HOST'])) {
            // Extract just the host portion if HTTP_HOST contains port
            $ip = explode(':', $_SERVER['HTTP_HOST'])[0];
        } else {
            // Fallback to localhost if we can't determine the address
            $ip = '127.0.0.1';
        }
        
        $port = '5050'; // Using port 5050 as specified in your links
        $files = file_exists("files.json") ? json_decode(file_get_contents("files.json"), true) : [];

        foreach ($files as $file) {
          $filename = htmlspecialchars($file['name']);
          // Use relative path if on the same server
          $link = "download.php?file=" . urlencode($file['unique']);
          echo "<li><a href='$link' class='text-blue-500' target='_blank'>$filename</a></li>";
        }
      ?>
    </ul>
  </div>
</body>
</html>
