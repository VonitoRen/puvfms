<?php
session_start();
include_once "../../static/conn.php"; 

//Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//Retrieve and sanitize the form data
// $id = filter_input(INPUT_POST, 'applicationStatusId', FILTER_SANITIZE_STRING);
// $name = filter_input(INPUT_POST, 'applicationStatusName', FILTER_SANITIZE_STRING);
// $description = filter_input(INPUT_POST, 'applicationStatusDescription', FILTER_SANITIZE_STRING);

$id = $_POST['roleId'];
$name = $_POST['roleName'];
$description = $_POST['roleDescription'];
$user_level = $_POST['user_level'];
// Validate the form data
if (empty($id) || empty($name) || empty($description) || empty($user_level)) {
    http_response_code(400); // Bad Request
    echo "hello";
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}
// Prepare the SQL statement to insert the data into the database
$stmt = $pdo->prepare("INSERT INTO tbl_role (role_id, role_name, role_description, user_level) VALUES (?, ?, ?, ?)");
$stmt->bindParam(1, $id);
$stmt->bindParam(2, $name);
$stmt->bindParam(3, $description);
$stmt->bindParam(4, $user_level);

// Execute the statement and check for errors
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Data added successfully!']);
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(['status' => 'error', 'message' => 'Failed to insert data into the database.']);
}
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
