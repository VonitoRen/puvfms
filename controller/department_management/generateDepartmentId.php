<?php 
include_once('../../static/conn.php');

function getDepartmentId($pdo){ 
    try {
        $stmt = $pdo->prepare("SELECT MAX(department_id) AS max_department_id FROM tbl_department");
        $stmt->execute();
        $departmentId = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Return the userLevel data or false if not found
        return $departmentId ? $departmentId['max_department_id'] : false;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        error_log("Error selecting user by email: " . $e->getMessage());
        return false;
    }
}

$departmentId = getDepartmentId($pdo);
$newId;

if (!$departmentId) {
    // No records found or error occurred
    $departmentId = 1;
}else{
    $departmentId = getDepartmentId($pdo)+1;
}


// Convert the $departmentId array to JSON
echo json_encode($departmentId, JSON_PRETTY_PRINT);

?>