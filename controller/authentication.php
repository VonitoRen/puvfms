<?php 
include_once('../static/conn.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //GET DATA FROM SERVER
    $email = $_POST['email'];
    $password = $_POST['password'];

    //validate if email is correct
    function selectEmail($pdo, $email) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM tbl_user WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Return the user data or false if not found
            return $user ? $user : false;
        } catch (PDOException $e) {
            // Handle PDO exceptions (e.g., database connection issues, syntax errors)
            error_log("Error selecting user by email: " . $e->getMessage());
            return false;
        }
    }

    $user = selectEmail($pdo, $email);

    if (!$user) {
        // User not found or error occurred
        echo "User not found or error occurred.";
        exit();
    }

    //validate if password is correct
    function passwordValidation($user, $password){
        if($user['password'] != $password){
            return false;
        }else{
            return true;
        }
    }

    $passwordIsCorrect = passwordValidation($user,$password);

    if(!$passwordIsCorrect){
        echo "User not found or error occurred.";
        exit();
    }

    function fetchUserInfoData($pdo, $user){
        try {
            $stmt = $pdo->prepare(
                "SELECT * FROM tbl_user u
                INNER JOIN tbl_user_info ui ON u.user_id = ui.user_id 
                WHERE u.user_id = :user_id");
            
            // Execute the prepared statement with user_id parameter
            $stmt->execute(['user_id' => $user['user_id']]);
            
            // Fetch the user data as an associative array
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Return the user data or false if not found
            return $userData ? $userData : false;
        } catch (PDOException $e) {
            // Handle PDO exceptions (e.g., database connection issues, syntax errors)
            error_log("Error fetching user info data: " . $e->getMessage());
            return false;
        }
    }

    $userData = fetchUserInfoData($pdo, $user);

    session_start();
    $_SESSION['userData'] = $userData;
    echo implode(', ', $_SESSION['userData']);

}else{
    header('location: ../index.php');
     exit();
}

?>