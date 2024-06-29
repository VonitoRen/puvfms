<?php
// Check if files were uploaded and applicantNumber is provided
if ($_FILES && isset($_POST['applicantNumber'])) {
    // Retrieve the unique ID from the POST data
    $applicantNumber = $_POST['applicantNumber'];

    // Define the base uploads directory
    $baseUploadsDir = "uploads/";

    // Ensure the base uploads directory exists
    if (!file_exists($baseUploadsDir)) {
        mkdir($baseUploadsDir, 0777, true); // Create the base uploads directory with full permissions
    }

    // Define the target directory using the applicantNumber
    $targetDir = $baseUploadsDir . $applicantNumber . "/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true); // Create the directory for the applicantNumber with full permissions
    }

    // Iterate through each uploaded file
    foreach ($_FILES as $inputName => $fileArray) {
        // Handle multiple file uploads for the same input field
        if (is_array($fileArray['name'])) {
            $fileCount = count($fileArray['name']);
            for ($i = 0; $i < $fileCount; $i++) {
                $fileName = basename($fileArray['name'][$i]);
                $targetFilePath = $targetDir . $fileName;

                // Check if file already exists
                if (file_exists($targetFilePath)) {
                    echo "File $fileName already exists in the folder $applicantNumber. Please rename the file.";
                } else {
                    // Move uploaded file to target directory
                    if (move_uploaded_file($fileArray['tmp_name'][$i], $targetFilePath)) {
                        echo "File $fileName uploaded successfully to folder $applicantNumber.";
                        // You can perform further processing here, such as database entry or additional operations
                    } else {
                        echo "Error uploading file $fileName.";
                    }
                }
            }
        } else { // This else part will handle arrays of files as well, so no change needed
            $fileName = basename($fileArray['name']);
            $targetFilePath = $targetDir . $fileName;

            // Check if file already exists
            if (file_exists($targetFilePath)) {
                echo "File $fileName already exists in the folder $applicantNumber. Please rename the file.";
            } else {
                // Move uploaded file to target directory
                if (move_uploaded_file($fileArray['tmp_name'], $targetFilePath)) {
                    echo "File $fileName uploaded successfully to folder $applicantNumber.";
                    // You can perform further processing here, such as database entry or additional operations
                } else {
                    echo "Error uploading file $fileName.";
                }
            }
        }
    }
} else {
    echo "No files were uploaded or applicantNumber not provided.";
}
?>