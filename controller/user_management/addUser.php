<?php 
include_once('../../static/conn.php');


// $_POST['email'];
$userData = array(
    'addUserLevel' => isset($_POST['addUserLevel']) ? trim($_POST['addUserLevel']) : '',
    'addUserDepartment' => isset($_POST['addUserDepartment']) ? trim($_POST['addUserDepartment']) : '',
    'addUserFirstName' => isset($_POST['addUserFirstName']) ? trim($_POST['addUserFirstName']) : '',
    'addUserMiddleName' => isset($_POST['addUserMiddleName']) ? trim($_POST['addUserMiddleName']) : '',
    'addUserLastName' => isset($_POST['addUserLastName']) ? trim($_POST['addUserLastName']) : '',
    'addUserSuffix' => isset($_POST['addUserSuffix']) ? trim($_POST['addUserSuffix']) : '',
    'addUserSex' => isset($_POST['addUserSex']) ? trim($_POST['addUserSex']) : '',
    'addUserBirthdate' => isset($_POST['addUserBirthdate']) ? trim($_POST['addUserBirthdate']) : '',
    'addUserEmail' => isset($_POST['addUserEmail']) ? filter_var($_POST['addUserEmail'], FILTER_SANITIZE_EMAIL) : '',
    'addUserPhoneNumber' => isset($_POST['addUserPhoneNumber']) ? trim($_POST['addUserPhoneNumber']) : '',
    'addUserPassword' => isset($_POST['addUserPassword']) ? trim($_POST['addUserPassword']) : '',
    'addUserRegion' => isset($_POST['addUserRegion']) ? trim($_POST['addUserRegion']) : '',
    'addUserProvince' => isset($_POST['addUserProvince']) ? trim($_POST['addUserProvince']) : '',
    'addUserCity' => isset($_POST['addUserCity']) ? trim($_POST['addUserCity']) : '',
    'addUserBarangay' => isset($_POST['addUserBarangay']) ? trim($_POST['addUserBarangay']) : '',
    'addUserStreet' => isset($_POST['addUserStreet']) ? trim($_POST['addUserStreet']) : ''
);

//validation for existing email
function emailIsExisting($pdo,$email){
    try {
        $stmt = $pdo->prepare("SELECT email FROM tbl_user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $fetchedUserEmail = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Return the fetched email data or false if not found
        return $fetchedUserEmail ? $fetchedUserEmail : false;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        error_log("Error selecting user by email: " . $e->getMessage());
        return false;
    }
}
// end of validation for existing email
$emailExist = emailIsExisting($pdo,$userData['addUserEmail']);

if ($emailExist) {
    // No records found or error occurred
    echo json_encode(["message" => "There is an existing record."]);
    exit();
}

// // Convert the $emailExist array to JSON
// echo json_encode($emailExist, JSON_PRETTY_PRINT);

?>