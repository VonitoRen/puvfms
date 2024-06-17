<?php 
include_once('../../static/conn.php');


        $stmt = $pdo->prepare(
                            "SELECT * FROM tbl_user_info ui
                            INNER JOIN tbl_user u ON u.user_id = ui.user_id 
                            RIGHT JOIN tbl_department d ON ui.department_id = d.department_id 
                            ");
        $stmt->execute();
        $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        



?>