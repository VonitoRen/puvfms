<?php
include_once '../../static/conn.php';

try {
    $stmt = $pdo->query('SELECT ownership_type_id, ownership_type_name, ownership_type_description, ownership_type_created_at FROM tbl_ownership_type');
    $ownershipTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($ownershipTypes);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    exit;
}
?>
