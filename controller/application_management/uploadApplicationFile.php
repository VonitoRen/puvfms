<?php
$targetDir = "uploads/"; // Directory where you want to store uploaded files
$uploadOk = 1;
$responses = [];

// Loop through files
foreach ($_FILES["files"]["name"] as $key => $name) {
    $targetFile = $targetDir . basename($name);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Allow only PDF, JPEG, and PNG files
    if($imageFileType != "pdf" && $imageFileType != "jpeg" && $imageFileType != "png") {
        $responses[] = "File $name: Only PDF, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
        continue;
    }

    // Check file size (max 5MB)
    if ($_FILES["files"]["size"][$key] > 5000000) {
        $responses[] = "File $name: Sorry, your file is too large.";
        $uploadOk = 0;
        continue;
    }

    // Upload file
    if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFile)) {
        $responses[] = "File $name: Uploaded successfully.";
    } else {
        $responses[] = "File $name: Sorry, there was an error uploading your file.";
        $uploadOk = 0;
    }
}

// Output responses
foreach ($responses as $response) {
    echo htmlspecialchars($response) . "<br>";
}
?>