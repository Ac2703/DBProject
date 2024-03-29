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
if (!tableExists($connection, "Accounts")) {
    $createTableQuery = "CREATE TABLE Accounts (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            email VARCHAR(255) NOT NULL,
                            password VARCHAR(255) NOT NULL
                        )";
    mysqli_query($connection, $createTableQuery);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the email and password fields are set
    if (isset($_POST["email"]) && isset($_POST["p3"])) {
        // Sanitize inputs to prevent SQL injection
        $email = mysqli_real_escape_string($connection, $_POST["email"]);
        $password = mysqli_real_escape_string($connection, $_POST["p3"]);
        
        // Perform a SELECT query to check for matching email and password
        $query = "SELECT * FROM accounts WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connection, $query);
        
        // Check if any rows are returned
        if (mysqli_num_rows($result) > 0) {
            // Matching email and password found, do something (e.g., set session, redirect)
            echo "Login successful!";
        } else {
            // No matching email and password found
            echo "Incorrect email or password!";
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
