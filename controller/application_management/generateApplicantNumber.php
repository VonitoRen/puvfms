<?php
include_once('../../static/conn.php');

// Function to generate a unique application number
function generateUniqueApplicationNumber($pdo) {
    $maxAttempts = 10; // Set a maximum number of attempts to generate a unique number
    $attempt = 0;

    do {
        // Generate new application number
        $newApplicationNumber = generateApplicationNumber();

        // Check if it's unique in the database
        $isUnique = isNewApplicationNumberUnique($newApplicationNumber, $pdo);

        // If unique, return the number
        if ($isUnique) {
            return $newApplicationNumber;
        }

        // Increment attempt counter
        $attempt++;

        // Check if maximum attempts reached
        if ($attempt >= $maxAttempts) {
            throw new Exception("Failed to generate a unique application number after $maxAttempts attempts.");
        }
    } while (true); // Continue until a unique number is found or max attempts reached
}

// Function to check if the application number exists
function isNewApplicationNumberUnique($newApplicationNumber, $pdo) {
    try {
        // Prepare and execute a SELECT query
        $sql = "SELECT COUNT(*) FROM tbl_application WHERE application_number = :applicationNumber";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":applicationNumber", $newApplicationNumber);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        // If count is 0, the number is unique; otherwise, it's not
        return $count === '0'; // Ensure comparison is strict
    } catch (PDOException $e) {
        error_log("PDO Error checking uniqueness: " . $e->getMessage());
        throw new Exception("Database error occurred.");
    }
}

// Generate application number
function generateApplicationNumber() {
    return date('Ymd') . generateRandomNumber();
}

// Generate random number
function generateRandomNumber() {
    $number = '';
    for ($i = 0; $i < 21; $i++) {
        $number .= mt_rand(0, 9);
    }
    return $number;
}

// Example usage to generate a unique application number
try {
    // Include your database connection file
    include_once('../../static/conn.php');

    // Generate a unique application number
    $newApplicationNumber = generateUniqueApplicationNumber($pdo);

    // Output or use the unique application number
    echo "Unique Application Number: " . $newApplicationNumber;
} catch (Exception $e) {
    // Handle exceptions (e.g., failed to generate unique number)
    error_log("Error generating application number: " . $e->getMessage());
    // Optionally, output an error message
    echo "Error generating application number. Please try again later.";
}
?>