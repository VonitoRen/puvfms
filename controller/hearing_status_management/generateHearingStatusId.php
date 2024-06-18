<?php 
include_once('../../static/conn.php');

function getHearingStatusId($pdo){ 
    try {
        $stmt = $pdo->prepare("SELECT MAX(hearing_status_id) AS max_hearing_status_id FROM tbl_hearing_status");
        $stmt->execute();
        $hearingStatusId = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Return the userLevel data or false if not found
        return $hearingStatusId ? $hearingStatusId['max_hearing_status_id'] : false;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        error_log("Error selecting user by email: " . $e->getMessage());
        return false;
    }
}

$hearingStatusId = getHearingStatusId($pdo);
$newId;

if (!$hearingStatusId) {
    // No records found or error occurred
    $hearingStatusId = 1;
}else{
    $hearingStatusId = getHearingStatusId($pdo)+1;
}


// Convert the $applicationStatusId array to JSON
echo json_encode($hearingStatusId, JSON_PRETTY_PRINT);

?>