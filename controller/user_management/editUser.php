<?php 
// UPDATE application_status
// SET status = 'completed', description = 'This status is now complete'
// WHERE id = 1;
session_start();
include_once "../../static/conn.php"; 

$userData = array(
    'editUserId' => isset($_POST['editUserId']) ? trim($_POST['editUserId']) : '',
    'editUserLevel' => isset($_POST['editUserLevel']) ? trim($_POST['editUserLevel']) : '',
    'editUserDepartment' => isset($_POST['editUserDepartment']) ? trim($_POST['editUserDepartment']) : '',
    'editUserFirstName' => isset($_POST['editUserFirstName']) ? trim($_POST['editUserFirstName']) : '',
    'editUserMiddleName' => isset($_POST['editUserMiddleName']) ? trim($_POST['editUserMiddleName']) : '',
    'editUserLastName' => isset($_POST['editUserLastName']) ? trim($_POST['editUserLastName']) : '',
    'editUserSuffix' => isset($_POST['editUserSuffix']) ? trim($_POST['editUserSuffix']) : '',
    'editUserSex' => isset($_POST['editUserSex']) ? trim($_POST['editUserSex']) : '',
    'editUserBirthdate' => isset($_POST['editUserBirthdate']) ? trim($_POST['editUserBirthdate']) : '',
    'editUserEmail' => isset($_POST['editUserEmail']) ? filter_var($_POST['editUserEmail'], FILTER_SANITIZE_EMAIL) : '',
    'editUserPhoneNumber' => isset($_POST['editUserPhoneNumber']) ? trim($_POST['editUserPhoneNumber']) : '',
    'editUserRegion' => isset($_POST['editUserRegion']) ? trim($_POST['editUserRegion']) : '',
    'editUserProvince' => isset($_POST['editUserProvince']) ? trim($_POST['editUserProvince']) : '',
    'editUserCity' => isset($_POST['editUserCity']) ? trim($_POST['editUserCity']) : '',
    'editUserBarangay' => isset($_POST['editUserBarangay']) ? trim($_POST['editUserBarangay']) : '',
    'editUserStreet' => isset($_POST['editUserStreet']) ? trim($_POST['editUserStreet']) : ''
);

function checkEmailExist($pdo, $email, $id) {
    $sql = "SELECT COUNT(*) FROM tbl_user WHERE email = :email AND user_id != :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

function editApplicationStatus($pdo, $userData) {
    if (checkEmailExist($pdo, $userData['editUserEmail'], $userData['editUserId'])) {
        echo json_encode(['status' => 'error', 'message' => "The name \"{$userData['editUserEmail']}\" is already taken."]);
        return;
    }

    try {
        $stmt = $pdo->prepare("
            UPDATE tbl_user_info ui
            INNER JOIN tbl_user u ON ui.user_id = u.user_id
            SET ui.user_first_name = :newFirstName,
                ui.user_last_name = :newLastName,
                ui.user_middle_name = :newMiddleName,
                ui.user_suffix = :newSuffix,
                ui.user_sex = :newSex,
                ui.user_birthyear = :newBirthYear,
                ui.user_birthmonth = :newBirthMonth,
                ui.user_birthday = :newBirthDay,
                u.email = :newEmail,
                ui.user_phone_number = :newPhoneNumber,
                ui.user_region = :newRegion,
                ui.user_province = :newProvince,
                ui.user_city_municipality = :newCityMunicipality,
                ui.user_barangay = :newBarangay,
                ui.user_street = :newStreet,
                u.user_level = :newUserLevel
            WHERE ui.user_id = :userId
        ");

        $userFirstName = strtoupper($userData['editUserFirstName']);

        $userMiddleName = "";
        if($userData['editUserMiddleName'] === ""){
            $userMiddleName = "";
        }else{
            $userMiddleName = strtoupper($userData['editUserMiddleName']);
        }
        
        $userLastName = strtoupper($userData['editUserLastName']);
        $userSuffix = "";

        if($userData['editUserSuffix'] === "none"){
            $userSuffix = "";
        }else{
            $userSuffix = $userData['editUserSuffix'];
        }


        $dateString = $userData['editUserBirthdate'];

        $timestamp = strtotime($dateString);
        $year = date('Y', $timestamp);   // Outputs: 2006
        $month = date('m', $timestamp);  // Outputs: 05
        $day = date('d', $timestamp);    // Outputs: 24

        $userBirthYear = $year; // Current timestamp
        $userBirthMonth = $month;
        $userBirthDay = $day;

        function cleanPhoneNumber($phoneNumber) {
            // Remove the '+' sign and spaces
            $cleanedNumber = str_replace(['+', ' '], '', $phoneNumber);
            return $cleanedNumber;
        }
        

        $newPhoneNumber =  cleanPhoneNumber($userData['editUserPhoneNumber']);
    
        $stmt->bindParam(':newFirstName',$userFirstName, PDO::PARAM_STR);
        $stmt->bindParam(':newLastName', $userLastName, PDO::PARAM_STR);
        $stmt->bindParam(':newMiddleName', $userMiddleName, PDO::PARAM_STR);
        $stmt->bindParam(':newSuffix', $userSuffix, PDO::PARAM_STR);
        $stmt->bindParam(':newSex', $userData['editUserSex'], PDO::PARAM_STR);
        $stmt->bindParam(':newBirthYear', $year, PDO::PARAM_STR);
        $stmt->bindParam(':newBirthMonth', $month, PDO::PARAM_STR);
        $stmt->bindParam(':newBirthDay', $day, PDO::PARAM_STR);
        $stmt->bindParam(':newEmail', $userData['editUserEmail'], PDO::PARAM_STR);
        $stmt->bindParam(':newPhoneNumber', $newPhoneNumber, PDO::PARAM_STR);
        $stmt->bindParam(':newRegion', $userData['editUserRegion'], PDO::PARAM_STR);
        $stmt->bindParam(':newProvince', $userData['editUserProvince'], PDO::PARAM_STR);
        $stmt->bindParam(':newCityMunicipality', $userData['editUserCity'], PDO::PARAM_STR);
        $stmt->bindParam(':newBarangay', $userData['editUserBarangay'], PDO::PARAM_STR);
        $stmt->bindParam(':newStreet', $userData['editUserStreet'], PDO::PARAM_STR);
        $stmt->bindParam(':newUserLevel', $userData['editUserLevel'], PDO::PARAM_STR);
        $stmt->bindParam(':userId', $userData['editUserId'], PDO::PARAM_INT);
        
        $stmt->execute();
        
        echo json_encode(['status' => 'success', 'message' => 'Record updated successfully.']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error updating record: ' . $e->getMessage()]);
        
    }
}


editApplicationStatus($pdo, $userData);

?>