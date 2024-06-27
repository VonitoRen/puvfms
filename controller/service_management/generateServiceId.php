<?php 
include_once('../../static/conn.php');

function getServiceId($pdo){ 
    try {
        $stmt = $pdo->prepare("SELECT MAX(service_id) AS max_service_id FROM tbl_service");
        $stmt->execute();
        $serviceId = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Return the userLevel data or false if not found
        return $serviceId ? $serviceId['max_service_id'] : false;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        error_log("Error selecting user by email: " . $e->getMessage());
        return false;
    }
}

$serviceId = getServiceId($pdo);
$newId;

if (!$serviceId) {
    // No records found or error occurred
    $serviceId = 1;
}else{
    $serviceId = getServiceId($pdo)+1;
}


// Convert the $serviceId array to JSON
echo json_encode($serviceId, JSON_PRETTY_PRINT);

?>