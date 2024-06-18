<?php
include_once '../../static/conn.php';

try {
    $stmt = $pdo->query('SELECT application_status_id, application_status_name, application_status_description, application_status_created_at FROM tbl_application_status');
    $applicationStatus = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($applicationStatus);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    exit;
}
?>
