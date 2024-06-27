<?php 
// UPDATE denomination
// SET status = 'completed', description = 'This status is now complete'
// WHERE id = 1;
session_start();
include_once "../../static/conn.php"; 

$denominationName = $_POST['denominationName'];
$denominationCodeName = $_POST['denominationCodeName'];
$denominationDescription = $_POST['denominationDescription'];
$denominationId = $_POST['denominationId'];

function checkNameExists($pdo, $name, $id) {
    $sql = "SELECT COUNT(*) FROM tbl_denomination WHERE denomination_code_name = :name AND denomination_id != :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

function editDenomination($pdo, $id, $newName, $newCodeName, $newDescription) {
    if (checkNameExists($pdo, $newName, $id)) {
        echo json_encode(['status' => 'error', 'message' => "The name '$newName' is already taken."]);
        return;
    }

    $sql = "UPDATE tbl_denomination SET denomination_code_name = :name, denomination_name = :codeName, denomination_description = :description WHERE denomination_id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $newName);
        $stmt->bindParam(':codeName', $newCodeName);
        $stmt->bindParam(':description', $newDescription);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error updating record: ' . $e->getMessage()]);
        
    }
}


editDenomination($pdo, $denominationId, $denominationName, $denominationCodeName, $denominationDescription);

?>