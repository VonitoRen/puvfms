<?php 
include_once('../../static/conn.php');

function getUserLevelData($pdo){
    try {
        $stmt = $pdo->prepare("SELECT * FROM tbl_user_level");
        $stmt->execute();
        $userLevels = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Return the userLevel data or false if not found
        return $userLevels ? $userLevels : false;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        error_log("Error selecting user by email: " . $e->getMessage());
        return false;
    }
}

$userLevels = getUserLevelData($pdo);

if (!$userLevels) {
    // No records found or error occurred
    echo json_encode(["message" => "There is no existing record."]);
    exit();
}

// Convert the $userLevels array to JSON
echo json_encode($userLevels, JSON_PRETTY_PRINT);

?>