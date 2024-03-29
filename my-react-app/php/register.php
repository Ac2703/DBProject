<?php

define('DB_NAME', 'ssmalley1');
define('DB_USER', 'ssmalley1');
define('DB_PASSWORD', 'ssmalley1');
define('DB_HOST', 'localhost');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Function to check if a table exists in the database
function tableExists($connection, $tableName) {
    $checkQuery = "SHOW TABLES LIKE '$tableName'";
    $checkResult = mysqli_query($connection, $checkQuery);
    return mysqli_num_rows($checkResult) > 0;
}

// Check if the accounts table exists, create it if not
if (!tableExists($connection, "accounts")) {
    $createTableQuery = "CREATE TABLE accounts (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            email VARCHAR(255) NOT NULL,
                            password VARCHAR(255) NOT NULL
                        )";
    mysqli_query($connection, $createTableQuery);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the email and password fields are set
    if (isset($_POST["email"]) && isset($_POST["p1"]) && isset($_POST["p2"])) {
        // Sanitize inputs to prevent SQL injection
        if ($_POST["p1"]!=$_POST["p2"]) {
            echo "Passwords must match";
        }else{
            $email = mysqli_real_escape_string($connection, $_POST["email"]);
            $password = mysqli_real_escape_string($connection, $_POST["p1"]);
            
            // Check if the email is already registered
            $checkEmailQuery = "SELECT * FROM accounts WHERE email='$email'";
            $checkEmailResult = mysqli_query($connection, $checkEmailQuery);
            
            if (mysqli_num_rows($checkEmailResult) > 0) {
                // Email already exists
                echo "Email already registered!";
            } else {
                // Insert new user into the database
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
                $insertQuery = "INSERT INTO accounts (email, password) VALUES ('$email', '$hashedPassword')";
                $insertResult = mysqli_query($connection, $insertQuery);
                
                if ($insertResult) {
                    // Registration successful
                    echo "Registration successful!";
                } else {
                    // Registration failed
                    echo "Registration failed. Please try again later.";
                }
            }
        }
    } else {
        // Fields are not set
        echo "Please provide both email and password!";
    }
} else {
    // Not a POST request
    echo "Invalid request method!";
}

// Close the database connection
mysqli_close($connection);

?>
