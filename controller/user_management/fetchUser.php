<?php 
include_once('../../static/conn.php');

$id = $_POST['user_id'];
function getUser($pdo, $id){
    try {
        $stmt = $pdo->prepare(
                            "SELECT ui.user_id,
                            ui.user_first_name,
                            ui.user_middle_name,
                            ui.user_last_name,
                            ui.user_suffix,
                            ui.user_birthyear,
                            ui.user_birthmonth,
                            ui.user_birthday,
                            ui.user_region,
                            ui.user_province,
                            ui.user_city_municipality,
                            ui.user_barangay,
                            ui.user_street,
                            ui.user_phone_number,
                            ui.user_sex,
                            d.department_id,
                            u.email,
                            u.user_level
                            FROM tbl_user_info ui
                            INNER JOIN tbl_user u ON u.user_id = ui.user_id 
                            INNER JOIN tbl_department d ON ui.department_id = d.department_id 
                            INNER JOIN tbl_user_level ul ON ul.user_level = u.user_level
                            WHERE ui.user_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Return the userLevel data or false if not found
        return $userData ? $userData : false;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        error_log("Error selecting user: " . $e->getMessage());
        return false;
    }
}

$userData = getUser($pdo, $id);

if (!$userData) {
    // No records found or error occurred
    echo json_encode(["message" => "There is no existing record."]);
    exit();
}

// Convert the $userData array to JSON
echo json_encode($userData, JSON_PRETTY_PRINT);

?>