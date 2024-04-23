<?php

// Database connection parameters
$servername = "localhost";
$username = "ssmalley1"; // Replace with your MySQL username
$password = "ssmalley1"; // Replace with your MySQL password
$database = "ssmalley1"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the database exists, if not, create it
if (!$conn->select_db($database)) {
    // Create database
    $sql_create_db = "CREATE DATABASE IF NOT EXISTS $database";
    if ($conn->query($sql_create_db) === TRUE) {
        // Select the database
        $conn->select_db($database);
        // SQL to create Accounts table
        $sql_create_table = "CREATE TABLE IF NOT EXISTS Accounts (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";
        if ($conn->query($sql_create_table) === FALSE) {
            echo "Error creating table: " . $conn->error;
        }
    } else {
        echo "Error creating database: " . $conn->error;
    }
}

// Check if email, password, and verify password are posted
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['verify_password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_password = $_POST['verify_password'];

    // Check if email already exists
    $sql_check_email = "SELECT * FROM Accounts WHERE email='$email'";
    $result = $conn->query($sql_check_email);

    if ($result->num_rows > 0) {
        // Email already registered
        echo "An account with this email already exists.";
    } else {
        // Check if passwords match
        if ($password !== $verify_password) {
            // Passwords don't match
            echo "Passwords must match.";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert account into Accounts table
            $sql_insert_account = "INSERT INTO Accounts (email, password) VALUES ('$email', '$hashed_password')";
            if ($conn->query($sql_insert_account) === TRUE) {
                // Account successfully created
                echo "Account successfully created.";
                // Redirect to login page
                header("Location: ../pages/loginpage.html");
                exit();
            } else {
                // Error inserting account
                echo "Error creating account: " . $conn->error;
            }
        }
    }
}

$conn->close();

?>
