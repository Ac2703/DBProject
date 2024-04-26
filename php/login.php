<?php

/// Database connection parameters
$servername = "localhost";
$username = "ssmalley1"; // Replace with your MySQL username
$password = "ssmalley1"; // Replace with your MySQL password
$database = "ssmalley1"; // Replace with your database name
// Create connection

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
echo "<script>clearMessage();</script>";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the Accounts table exists, if not, create it
if ($result = $conn->query("SHOW TABLES LIKE 'Accounts'")) {
    if ($result->num_rows == 0) {
        // Create Accounts table
        $sql_create_table = "CREATE TABLE IF NOT EXISTS Accounts (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";
        if ($conn->query($sql_create_table) === FALSE) {
            echo "Error creating table: " . $conn->error;
        }
    } 
    $result->close();
} else {
    echo "Error checking table existence: " . $conn->error;
}


// Check if email and password are posted
if(isset($_POST['username']) && isset($_POST['password'])) {
    $email = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the account exists
    $sql_check_account = "SELECT * FROM Accounts WHERE email='$email'";
    $result = $conn->query($sql_check_account);

    if ($result->num_rows > 0) {
        // Account exists, check password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Successful login
            session_start();
            setcookie("loggedInUser", $email, time() + (86400 * 30), "/"); // Cookie expires in 30 days
            header("Location: ../pages/homepage.php");
            exit();
        } else {
            // Invalid password
            echo "<script>appendMessage('Invalid email or password.');</script>";
        }
    } else {
        // Account doesn't exist
        echo "<script>appendMessage('Account not found.');</script>";
        header("Location: ../pages/loginpage.html");
    }
}

$conn->close();

?>
