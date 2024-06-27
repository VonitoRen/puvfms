<?php 
date_default_timezone_set('Asia/Manila');
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

function getLatestUserId($pdo){
    try {
        $stmt = $pdo->prepare("SELECT MAX(CAST(user_id AS UNSIGNED)) AS current_user_id FROM tbl_user;");
        $stmt->execute();
        $fetchedMaxId = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Return the fetched email data or false if not found
        return $fetchedMaxId ? $fetchedMaxId['current_user_id'] : false;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        error_log("Error selecting user by email: " . $e->getMessage());
        return false;
    }
}

function addUser($userData,$incrementedUserId,$pdo){


    try {
        $stmt = $pdo->prepare("INSERT INTO tbl_user (user_id, email, password, user_status, user_created_at, user_level) VALUES (?,?,?,?,?,?)");

        $userId = $incrementedUserId;
        $email = $userData['addUserEmail'];
        $password = password_hash($incrementedUserId, PASSWORD_BCRYPT); // Hash the password before storing
        $userStatus = 1;
        $userCreatedAt = date('Y-m-d H:i:s'); // Current timestamp
        $userLevel = $userData['addUserLevel'];
        
        $stmt->bindParam(1, $userId);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $password);
        $stmt->bindParam(4, $userStatus);
        $stmt->bindParam(5, $userCreatedAt);
        $stmt->bindParam(6, $userLevel);

        $stmt->execute();
        $fetchedUserEmail = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return true;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        error_log("Error inserting user to the database: " . $e->getMessage());
        return false;
    }
}

function addUserInfo($userData, $pdo, $incrementedUserId){
    try {
        $stmt = $pdo->prepare("INSERT INTO tbl_user_info (user_id, user_first_name, user_middle_name, user_last_name, user_suffix, user_birthyear, user_birthmonth, user_birthday, user_region, user_province, user_city_municipality,user_barangay,user_street,user_phone_number,user_sex,department_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $userId = $incrementedUserId;
        $userFirstName = $userData['addUserFirstName'];

        $userMiddleName = "";
        if($userData['addUserMiddleName'] === ""){
            $userMiddleName = "";
        }else{
            $userMiddleName = $userData['addUserMiddleName'];
        }
        
        $userLastName = $userData['addUserLastName'];
        $userSuffix = "";

        if($userData['addUserSuffix'] === "none"){
            $userSuffix = "";
        }else{
            $userSuffix = $userData['addUserSuffix'];
        }


        $dateString = $userData['addUserBirthdate'];

        $timestamp = strtotime($dateString);
        $year = date('Y', $timestamp);   // Outputs: 2006
        $month = date('m', $timestamp);  // Outputs: 05
        $day = date('d', $timestamp);    // Outputs: 24

        $userBirthYear = $year; // Current timestamp
        $userBirthMonth = $month;
        $userBirthDay = $day;

        $userRegion = $userData['addUserRegion'];
        $userProvince = $userData['addUserProvince'];
        $userCityMunicipality = $userData['addUserCity'];
        $userBarangay = $userData['addUserBarangay'];
        $userStreet = $userData['addUserStreet'];

        function cleanPhoneNumber($phoneNumber) {
            // Remove the '+' sign and spaces
            $cleanedNumber = str_replace(['+', ' '], '', $phoneNumber);
            return $cleanedNumber;
        }
    


        $userPhoneNumber =  cleanPhoneNumber($userData['addUserPhoneNumber']);
        $userSex = $userData['addUserSex'];
        $userDeparment = $userData['addUserDepartment'];

        $stmt->bindParam(1, $userId);
        $stmt->bindParam(2, $userFirstName);
        $stmt->bindParam(3, $userMiddleName);
        $stmt->bindParam(4, $userLastName);
        $stmt->bindParam(5, $userSuffix);
        $stmt->bindParam(6, $userBirthYear);
        $stmt->bindParam(7, $userBirthMonth);
        $stmt->bindParam(8, $userBirthDay);
        $stmt->bindParam(9, $userRegion);
        $stmt->bindParam(10, $userProvince);
        $stmt->bindParam(11, $userCityMunicipality);
        $stmt->bindParam(12, $userBarangay);
        $stmt->bindParam(13, $userStreet);
        $stmt->bindParam(14, $userPhoneNumber);
        $stmt->bindParam(15, $userSex);
        $stmt->bindParam(16, $userDeparment);
        $stmt->execute();
     

        return true;
    } catch (PDOException $e) {
        // Handle PDO exceptions (e.g., database connection issues, syntax errors)
        echo "Error inserting user to the database: " . $e->getMessage();
        error_log("Error inserting user to the database: " . $e->getMessage());
        return false;
    } catch (Exception $e) {
        // Handle other exceptions
        echo "Error: " . $e->getMessage();
        error_log("Error: " . $e->getMessage());
        return false;
        exit();
    }
}

$incrementedUserId = getLatestUserId($pdo);

if ($incrementedUserId !== false) {
    $incrementedUserId = $incrementedUserId+1;

} else {
    $currentYear = date('Y');
    $incrementedUserId = $currentYear . str_pad(1,4, '0',STR_PAD_LEFT);

}

// $userSuccessfullyAdded = addUser($userData, $incrementedUserId, $pdo);
addUserInfo($userData, $pdo, $incrementedUserId);
addUser($userData,$incrementedUserId,$pdo);
// // Convert the $emailExist array to JSON
$successFullyAdded = ["message" => "User successfully added!"];
echo json_encode($successFullyAdded, JSON_PRETTY_PRINT);

?>