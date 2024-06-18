<?php 
include_once('../../static/conn.php');

function getdocumentTypeId($pdo){ 
    try {
        $stmt = $pdo->prepare("SELECT MAX(document_type_id) AS max_document_type_id FROM tbl_document_type");
        $stmt->execute();
        $documentTypeId= $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Return the userLevel data or false if not found
        return $documentTypeId ? $documentTypeId['max_document_type_id'] : false;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        error_log("Error selecting user by email: " . $e->getMessage());
        return false;
    }
}

$documentTypeId = getdocumentTypeId($pdo);
$newId;

if (!$documentTypeId) {
    // No records found or error occurred
    $documentTypeId = 1;
}else{
    $documentTypeId = getdocumentTypeId($pdo)+1;
}


// Convert the $applicationStatusId array to JSON
echo json_encode($documentTypeId, JSON_PRETTY_PRINT);

?>