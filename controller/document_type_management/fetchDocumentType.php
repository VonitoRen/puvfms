<?php
include_once '../../static/conn.php';

try {
    $stmt = $pdo->query('SELECT document_type_id, document_type_name, document_type_description, document_type_created_at FROM tbl_document_type');
    $documentTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($documentTypes);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    exit;
}
?>
