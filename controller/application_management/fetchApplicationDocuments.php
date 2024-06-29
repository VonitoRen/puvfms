<?php
session_start();
include_once "../../static/conn.php"; 
$_POST['applicantNumber'] = '20240629974861873049600459493';

function fetchFilePaths($applicantNumber,$pdo) {


    // Prepare SQL statement to fetch file paths for given applicantNumber
    $stmt = $pdo->prepare("SELECT file_path FROM tbl_document_upload WHERE applicant_number = ?");
    $stmt->execute([$applicantNumber]);

    // Fetch all rows (file paths) into an array
    $filePaths = $stmt->fetchAll(PDO::FETCH_COLUMN);

    return $filePaths;
}

// Example usage:
if (isset($_POST['applicantNumber'])) {
    $applicantNumber = $_POST['applicantNumber'];
    
    // Fetch file paths from database for the given applicantNumber
    $filePaths = fetchFilePaths($applicantNumber, $pdo);

    // Display file paths
    if ($filePaths) {
        echo "<h2>Uploaded Files for Applicant Number: $applicantNumber</h2>";
        echo "<ul>";
        foreach ($filePaths as $filePath) {
            echo "<li><a href='$filePath' target='_blank'>$filePath</a></li>";
        }
        echo "</ul>";
    } else {
        echo "No files found for applicant number: $applicantNumber";
    }
} else {
    echo "Applicant number not provided.";
}
?>