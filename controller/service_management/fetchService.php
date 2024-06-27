<?php
include_once '../../static/conn.php';

try {
    $stmt = $pdo->query('SELECT service_id, service_name, service_description, service_created_at FROM tbl_service');
    $serviceStatus = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($serviceStatus);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    exit;
}
?>
