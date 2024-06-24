<?php
include_once '../../static/conn.php';

try {
    $stmt = $pdo->query('SELECT denomination_id, denomination_code_name, denomination_name, denomination_description, denomination_created_at FROM tbl_denomination');
    $applicationStatus = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($applicationStatus);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    exit;
}
?>
