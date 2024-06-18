<?php
session_start();
include_once "../../static/conn.php"; 

//Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//Retrieve and sanitize the form data
// $id = filter_input(INPUT_POST, 'applicationStatusId', FILTER_SANITIZE_STRING);
// $name = filter_input(INPUT_POST, 'applicationStatusName', FILTER_SANITIZE_STRING);
// $description = filter_input(INPUT_POST, 'applicationStatusDescription', FILTER_SANITIZE_STRING);

$id = $_POST['documentTypeIdInput'];
$name = $_POST['documentTypeNameInput'];
$description = $_POST['documentTypeDescriptionInput'];
// Validate the form data
if (empty($id) || empty($name) || empty($description)) {
    http_response_code(400); // Bad Request
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}
// Prepare the SQL statement to insert the data into the database
$stmt = $pdo->prepare("INSERT INTO tbl_document_type (document_type_id, document_type_name, document_type_description) VALUES (?, ?, ?)");
$stmt->bindParam(1, $id);
$stmt->bindParam(2, $name);
$stmt->bindParam(3, $description);
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
