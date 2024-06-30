<?php
session_start();
include_once "../../static/conn.php"; 

function fetchFilePaths($applicantNumber, $pdo) {
    // Prepare SQL statement to fetch file paths for given applicantNumber
    $stmt = $pdo->prepare("SELECT file_path FROM tbl_document_upload WHERE applicant_number = ?");
    $stmt->execute([$applicantNumber]);

    // Fetch all rows (file paths) into an array
    $filePaths = $stmt->fetchAll(PDO::FETCH_COLUMN);

    return $filePaths;
}

// Check if applicantNumber is provided via POST
if (isset($_POST['application_number'])) {
    $applicantNumber = $_POST['application_number'];
    
    // Fetch file paths from database for the given applicantNumber
    $filePaths = fetchFilePaths($applicantNumber, $pdo);

    // Output file paths as JSON
    echo json_encode($filePaths);
} else {
    echo "Applicant number not provided.";
}
?>