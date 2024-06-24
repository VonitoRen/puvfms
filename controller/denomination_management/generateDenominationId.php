<?php 
include_once('../../static/conn.php');

function getDenominationId($pdo){ 
    try {
        $stmt = $pdo->prepare("SELECT MAX(denomination_id) AS max_denomination_id FROM tbl_denomination");
        $stmt->execute();
        $denominationId = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Return the userLevel data or false if not found
        return $denominationId ? $denominationId['max_denomination_id'] : false;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        error_log("Error selecting user by email: " . $e->getMessage());
        return false;
    }
}

$denominationId = getDenominationId($pdo);
$newId;

if (!$denominationId) {
    // No records found or error occurred
    $denominationId = 1;
}else{
    $denominationId = getDenominationId($pdo)+1;
}


// Convert the $denominationId array to JSON
echo json_encode($denominationId, JSON_PRETTY_PRINT);

?>