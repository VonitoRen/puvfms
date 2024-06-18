<?php
include_once '../../static/conn.php';

try {
    $stmt = $pdo->query('SELECT hearing_status_id, hearing_status_name, hearing_status_description, hearing_status_created_at FROM tbl_hearing_status');
    $documentTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($documentTypes);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    exit;
}
?>
