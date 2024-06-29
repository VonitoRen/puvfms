<?php
session_start();
include_once "../../static/conn.php"; 

function uploadFilesAndStorePaths($applicantNumber, $files, $pdo) {
    // Define base uploads directory
    $baseUploadsDir = "uploads/";

    // Ensure base uploads directory exists
    if (!file_exists($baseUploadsDir)) {
        mkdir($baseUploadsDir, 0777, true); // Create base uploads directory with full permissions
    }

    // Define target directory using applicantNumber
    $targetDir = $baseUploadsDir . $applicantNumber . "/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true); // Create directory for applicantNumber with full permissions
    }

    // Array to store file paths for database insertion
    $filePaths = [];

    // Iterate through each uploaded file
    foreach ($files as $inputName => $fileArray) {
        // Handle multiple file uploads for the same input field
        if (is_array($fileArray['name'])) {
            $fileCount = count($fileArray['name']);
            for ($i = 0; $i < $fileCount; $i++) {
                $fileName = basename($fileArray['name'][$i]);
                $targetFilePath = $targetDir . $fileName;

                // Move uploaded file to target directory
                if (move_uploaded_file($fileArray['tmp_name'][$i], $targetFilePath)) {
                    // Store file path in database
                    $filePath = $targetFilePath;
                    $stmt = $pdo->prepare("INSERT INTO tbl_document_upload (applicant_number, file_path) VALUES (?, ?)");
                    $stmt->execute([$applicantNumber, $filePath]);



                    $filePaths[] = $filePath; // Store file path for potential use/display
                } else {
                    echo "Error uploading file $fileName.";
                }
            }
        } else { // Single file upload scenario
            $fileName = basename($fileArray['name']);
            $targetFilePath = $targetDir . $fileName;

            // Move uploaded file to target directory
            if (move_uploaded_file($fileArray['tmp_name'], $targetFilePath)) {
                // Store file path in database
                $filePath = $targetFilePath;
                $stmt = $pdo->prepare("INSERT INTO uploads (applicantNumber, file_path) VALUES (?, ?)");
                $stmt->execute([$applicantNumber, $filePath]);
                $filePaths[] = $filePath; // Store file path for potential use/display
            } else {
                echo "Error uploading file $fileName.";
            }
        }
    }

    $stmt = $pdo->prepare("INSERT INTO tbl_application (application_number, application_status_id) VALUES (?, ?)");
    $stmt->execute([$applicantNumber, '3']);
    
    return $filePaths;
}

// Example usage:
if ($_FILES && isset($_POST['applicantNumber'])) {
    $applicantNumber = $_POST['applicantNumber'];
    $uploadedFilePaths = uploadFilesAndStorePaths($applicantNumber, $_FILES, $pdo);

    // Output uploaded file paths for confirmation or further processing
    foreach ($uploadedFilePaths as $filePath) {
        echo "File uploaded successfully: $filePath<br>";
    }
} else {
    echo "No files were uploaded or applicantNumber not provided.";
}
?>