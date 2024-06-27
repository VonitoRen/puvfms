<?php 
// UPDATE service
// SET status = 'completed', description = 'This status is now complete'
// WHERE id = 1;
session_start();
include_once "../../static/conn.php"; 

$serviceName = $_POST['serviceName'];
$serviceDescription = $_POST['serviceDescription'];
$serviceId = $_POST['serviceId'];

function checkNameExists($pdo, $name, $id) {
    $sql = "SELECT COUNT(*) FROM tbl_service WHERE service_name = :name AND service_id != :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

function editService($pdo, $id, $newName, $newDescription) {
    if (checkNameExists($pdo, $newName, $id)) {
        echo json_encode(['status' => 'error', 'message' => "The name '$newName' is already taken."]);
        return;
    }

    $sql = "UPDATE tbl_service SET service_name = :name, service_description = :description WHERE service_id = :id";
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


editService($pdo, $serviceId, $serviceName, $serviceDescription);

?>