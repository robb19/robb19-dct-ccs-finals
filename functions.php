<?php
session_start();

/**
 * Establishes a database connection.
 * 
 * @return mysqli Database connection instance.
 */
function connectDatabase() {
    $database = new mysqli("localhost", "root", "", "dct-ccs-finals");

    if ($database->connect_error) {
        die("Connection error: " . $database->connect_error);
    }
    return $database;
}

/**
 * Safely terminates the database connection.
 * 
 * @param mysqli $database Database connection instance.
 */
function disconnectDatabase($database) {
    $database->close();
}

/**
 * Logs debug messages for troubleshooting.
 * 
 * @param string $logMessage Message to be logged.
 */
function logDebug($logMessage) {
    error_log("[DEBUG LOG] " . $logMessage);
}

/**
 * Authenticates a user with provided credentials.
 * 
 * @param string $email The email address entered by the user.
 * @param string $password The password entered by the user.
 * @return bool True if authentication succeeds, false otherwise.
 */
function authenticateUser($email, $password) {
    $database = connectDatabase();

    // Securely hash the password.
    $encryptedPassword = md5($password);
    $query = "SELECT * FROM users WHERE email = ? AND password = ?";
    $statement = $database->prepare($query);
    $statement->bind_param("ss", $email, $encryptedPassword);
    $statement->execute();

    $queryResult = $statement->get_result();

    if ($queryResult->num_rows > 0) {
        $userData = $queryResult->fetch_assoc();

        // Store user data in session variables.
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $userData['id'];

        $statement->close();
        disconnectDatabase($database);
        return true;
    } else {
        $statement->close();
        disconnectDatabase($database);
        return false;
    }
}
?>
