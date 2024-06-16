<?php
session_start();
include_once "../../static/conn.php"; 

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize the form data
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

    // Validate the form data
    if (empty($id) || empty($name) || empty($description)) {
        http_response_code(400); // Bad Request
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    // Prepare the SQL statement to insert the data into the database
    $stmt = $conn->prepare("INSERT INTO tbl_application_status (application_status_id, application_status_name, application_status_description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $id, $name, $description);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Data added successfully!']);
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert data into the database.']);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
