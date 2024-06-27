<?php 
// UPDATE document_type
// SET status = 'completed', description = 'This status is now complete'
// WHERE id = 1;
session_start();
include_once "../../static/conn.php"; 

$documentTypeName = $_POST['documentTypeName'];
$documentTypeDescription = $_POST['documentTypeDescription'];
$documentTypeId = $_POST['documentTypeId'];

function checkNameExists($pdo, $name, $id) {
    $sql = "SELECT COUNT(*) FROM tbl_document_type WHERE document_type_name = :name AND document_type_id != :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

function editDocumentType($pdo, $id, $newName, $newDescription) {
    if (checkNameExists($pdo, $newName, $id)) {
        echo json_encode(['status' => 'error', 'message' => "The name '$newName' is already taken."]);
        return;
    }

    $sql = "UPDATE tbl_document_type SET document_type_name = :name, document_type_description = :description WHERE document_type_id = :id";
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


editDocumentType($pdo, $documentTypeId, $documentTypeName, $documentTypeDescription);

?>