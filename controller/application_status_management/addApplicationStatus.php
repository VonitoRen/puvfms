<?php
session_start();
include_once "../../static/conn.php"; 

//Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Retrieve and sanitize the form data
    $id = filter_input(INPUT_POST, 'applicationStatusId', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'applicationStatusName', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'applicationStatusDescription', FILTER_SANITIZE_STRING);


    // $description = $_POST['applicationStatusDescription'];
    // Validate the form data
    if (empty($id) || empty($name) || empty($description)) {
        http_response_code(400); // Bad Request
        echo "hello";
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    function checkIfExisting($pdo, $name){
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM tbl_application_status WHERE application_status_name = :applicationStatusName");
        $capitalizedName = strtoupper($name);
        $stmt->bindParam(':applicationStatusName', $capitalizedName);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    if(checkIfExisting($pdo, $name)){
        echo json_encode(['status' => 'error', 'message' => 'Application status name is already taken.']);
        exit();
    }



    function addApplicationStatus($pdo, $id, $name, $description){
        $stmt = $pdo->prepare("INSERT INTO tbl_application_status (application_status_id, application_status_name, application_status_description) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $id);
        $capitalizedName2 = strtoupper($name);
        $stmt->bindParam(2, $capitalizedName2);
        $stmt->bindParam(3, $description);
        // Execute the statement and check for errors
        if ($stmt->execute()) {
            $msg = ['status' => 'success', 'message' => 'Data added successfully!'];
            return $msg;
        } else {
            $msg = http_response_code(500);

            return $msg ;
        } 
    }
    echo json_encode(addApplicationStatus($pdo, $id, $name, $description));
}else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}    

?>
