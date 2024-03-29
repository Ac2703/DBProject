<?php
define('DB_NAME', 'ssmalley1');
define('DB_USER', 'ssmalley1');
define('DB_PASSWORD', 'ssmalley1');
define('DB_HOST', 'localhost');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// function to check if a table exists in the database
function tableExists($connection, $tableName) {
    $checkQuery = "SHOW TABLES LIKE '$tableName'";
    $checkResult = mysqli_query($connection, $checkQuery);
    return mysqli_num_rows($checkResult) > 0;
}

// check if the accounts table exists, create it if not
if (!tableExists($connection, "Accounts")) {
    $createTableQuery = "CREATE TABLE Accounts (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            email VARCHAR(255) NOT NULL,
                            password VARCHAR(255) NOT NULL
                        )";
    mysqli_query($connection, $createTableQuery);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["email"]) && isset($_POST["p3"])) {
        // Sanitize inputs to prevent SQL injection
        $email = mysqli_real_escape_string($connection, $_POST["email"]);
        $password = mysqli_real_escape_string($connection, $_POST["p3"]);
        
        $query = "SELECT * FROM accounts WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connection, $query);
        
        // Check if any rows are returned
        if (mysqli_num_rows($result) > 0) {
            echo "Login successful!";
        } else {
            echo "Incorrect email or password!";
        }
    } else {
        echo "Please provide both email and password!";
    }
} else {
    echo "Invalid request method!";
}

mysqli_close($connection);

?>
