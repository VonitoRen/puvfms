<?php 
include_once('../../static/conn.php');

function getUser($pdo){
    try {
        $stmt = $pdo->prepare(
                            "SELECT u.user_id, CONCAT(user_first_name, ' ', user_middle_name, ' ', user_last_name) AS fullname, 
                            department_name, 
                            user_status,
                            user_level_name,
                            user_created_at
                            FROM tbl_user_info ui
                            INNER JOIN tbl_user u ON u.user_id = ui.user_id 
                            INNER JOIN tbl_department d ON ui.department_id = d.department_id 
                            INNER JOIN tbl_user_level ul ON ul.user_level = u.user_level
                            ORDER BY CAST(ui.user_id AS INT) DESC");
        $stmt->execute();
        $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Return the userLevel data or false if not found
        return $userData ? $userData : false;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        error_log("Error selecting user: " . $e->getMessage());
        return false;
    }
}

$userData = getUser($pdo);

if (!$userData) {
    // No records found or error occurred
    echo json_encode(["message" => "There is no existing record."]);
    exit();
}

// Convert the $userData array to JSON
echo json_encode($userData, JSON_PRETTY_PRINT);

?>