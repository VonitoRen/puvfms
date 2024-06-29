<?php
include_once '../../static/conn.php';

try {
    $stmt = $pdo->query('SELECT application_number, application_applied_at, application_status_name FROM tbl_application a
                        INNER JOIN tbl_application_status ass ON ass.application_status_id = a.application_status_id');
    $application = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($application);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    exit;
}
?>
