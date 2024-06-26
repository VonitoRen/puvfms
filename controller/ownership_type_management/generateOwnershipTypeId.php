<?php 
include_once('../../static/conn.php');

function getownershipTypeId($pdo){ 
    try {
        $stmt = $pdo->prepare("SELECT MAX(ownership_type_id) AS max_ownership_type_id FROM tbl_ownership_type");
        $stmt->execute();
        $ownershipTypeId= $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Return the userLevel data or false if not found
        return $ownershipTypeId ? $ownershipTypeId['max_ownership_type_id'] : false;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        error_log("Error selecting user by email: " . $e->getMessage());
        return false;
    }
}

$ownershipTypeId = getownershipTypeId($pdo);
$newId;

if (!$ownershipTypeId) {
    // No records found or error occurred
    $ownershipTypeId = 1;
}else{
    $ownershipTypeId = getownershipTypeId($pdo)+1;
}


// Convert the $applicationStatusId array to JSON
echo json_encode($ownershipTypeId, JSON_PRETTY_PRINT);

?>