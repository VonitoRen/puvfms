<?php
session_start();
include_once "../../static/conn.php"; 

//Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//Retrieve and sanitize the form data
// $id = filter_input(INPUT_POST, 'applicationStatusId', FILTER_SANITIZE_STRING);
// $name = filter_input(INPUT_POST, 'applicationStatusName', FILTER_SANITIZE_STRING);
// $description = filter_input(INPUT_POST, 'applicationStatusDescription', FILTER_SANITIZE_STRING);

$id = $_POST['denominationId'];
$code = $_POST['denominationCodeName'];
$name = $_POST['denominationName'];
$description = $_POST['denominationDescription'];
// Validate the form data
if (empty($id) || empty($code) || empty($name) || empty($description)) {
    http_response_code(400); // Bad Request
    echo "hello";
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}

// Check if the denominationCodeName or denominationName already exists
$stmt = $pdo->prepare("SELECT COUNT(*) FROM tbl_denomination WHERE denomination_code_name = ? OR denomination_name = ?");
$stmt->execute([$code, $name]);
$count = $stmt->fetchColumn();

if ($count > 0) {
    http_response_code(409); // Conflict
    echo json_encode(['status' => 'error', 'message' => 'The denomination code or name already exists.']);
    exit;
}

// Prepare the SQL statement to insert the data into the database
$stmt = $pdo->prepare("INSERT INTO tbl_denomination (denomination_id, denomination_code_name, denomination_name, denomination_description) VALUES (?, ?, ?, ?)");
$stmt->bindParam(1, $id);
$stmt->bindParam(2, $code);
$stmt->bindParam(3, $name);
$stmt->bindParam(4, $description);
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
