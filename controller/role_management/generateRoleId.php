<?php 
include_once('../../static/conn.php');

function getRoleId($pdo){ 
    try {
        $stmt = $pdo->prepare("SELECT MAX(role_id) AS max_role_id FROM tbl_role");
        $stmt->execute();
        $roleId = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Return the userLevel data or false if not found
        return $roleId ? $roleId['max_role_id'] : false;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        error_log("Error selecting user by email: " . $e->getMessage());
        return false;
    }
}

$roleId = getRoleId($pdo);
$newId;

if (!$roleId) {
    // No records found or error occurred
    $roleId = 1;
}else{
    $roleId = getRoleId($pdo)+1;
}


// Convert the $roleId array to JSON
echo json_encode($roleId, JSON_PRETTY_PRINT);

?>