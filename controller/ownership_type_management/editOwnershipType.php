<?php 
// UPDATE ownership_type
// SET status = 'completed', description = 'This status is now complete'
// WHERE id = 1;
session_start();
include_once "../../static/conn.php"; 

$ownershipTypeName = $_POST['ownershipTypeName'];
$ownershipTypeDescription = $_POST['ownershipTypeDescription'];
$ownershipTypeId = $_POST['ownershipTypeId'];

function checkNameExists($pdo, $name, $id) {
    $sql = "SELECT COUNT(*) FROM tbl_ownership_type WHERE ownership_type_name = :name AND ownership_type_id != :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

function editOwnershipType($pdo, $id, $newName, $newDescription) {
    if (checkNameExists($pdo, $newName, $id)) {
        echo json_encode(['status' => 'error', 'message' => "The name '$newName' is already taken."]);
        return;
    }

    $sql = "UPDATE tbl_ownership_type SET ownership_type_name = :name, ownership_type_description = :description WHERE ownership_type_id = :id";
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


editOwnershipType($pdo, $ownershipTypeId, $ownershipTypeName, $ownershipTypeDescription);

?>