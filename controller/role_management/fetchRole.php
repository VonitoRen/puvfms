<?php
include_once '../../static/conn.php';

try {
    $stmt = $pdo->query('SELECT role_id, role_name, role_description, role_created_at, role_updated_at, user_level FROM tbl_role');
    $role = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($role);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    exit;
}
?>
