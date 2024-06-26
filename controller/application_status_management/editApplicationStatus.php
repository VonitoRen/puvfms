<?php 
// UPDATE application_status
// SET status = 'completed', description = 'This status is now complete'
// WHERE id = 1;
session_start();
include_once "../../static/conn.php"; 

$applicationStatusName = $_POST['applicationStatusName'];
$applicationStatusDescription = $_POST['applicationStatusDescription'];
$applicationStatusId = $_POST['applicationStatusId'];

function checkNameExists($pdo, $name, $id) {
    $sql = "SELECT COUNT(*) FROM tbl_application_status WHERE application_status_name = :name AND application_status_id != :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

function editApplicationStatus($pdo, $id, $newName, $newDescription) {
    if (checkNameExists($pdo, $newName, $id)) {
        echo json_encode(['status' => 'error', 'message' => "The name '$newName' is already taken."]);
        return;
    }

    $sql = "UPDATE tbl_application_status SET application_status_name = :name, application_status_description = :description WHERE application_status_id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $newName);
        $stmt->bindParam(':description', $newDescription);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error updating record: ' . $e->getMessage()]);
        
    }
}


editApplicationStatus($pdo, $applicationStatusId, $applicationStatusName, $applicationStatusDescription);

?>