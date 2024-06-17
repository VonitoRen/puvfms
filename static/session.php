
<?php
function session_check($url){
    // Start the session if it hasn't been started already
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Check if the user is authenticated
    if ($_SESSION['authenticated'] != true) {
        // Redirect to the specified URL
        echo "helo";
        header("Location: $url");
        exit(); // Ensure script stops executing after redirection
    }
}
?>