<?php 
include_once('../../static/conn.php');

function getApplicationStatusId($pdo){ 
    try {
        $stmt = $pdo->prepare("SELECT MAX(application_status_id) AS max_application_status_id FROM tbl_application_status");
        $stmt->execute();
        $applicationStatusId = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Return the userLevel data or false if not found
        return $applicationStatusId ? $applicationStatusId['max_application_status_id'] : false;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        error_log("Error selecting user by email: " . $e->getMessage());
        return false;
    }
}

$applicationStatusId = getApplicationStatusId($pdo);
$newId;

if (!$applicationStatusId) {
    // No records found or error occurred
    $applicationStatusId = 1;
}else{
    $applicationStatusId = getApplicationStatusId($pdo)+1;
}


// Convert the $applicationStatusId array to JSON
echo json_encode($applicationStatusId, JSON_PRETTY_PRINT);

?>