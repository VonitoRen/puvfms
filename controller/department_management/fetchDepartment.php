<?php
include_once '../../static/conn.php';

try {
    $stmt = $pdo->query('SELECT department_id, department_name, department_created_at FROM tbl_department');
    $applicationStatus = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($applicationStatus);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    exit;
}
?>
