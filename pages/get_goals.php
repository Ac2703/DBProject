<?php
// Database connection parameters
$servername = "localhost";
$username = "ssmalley1"; // Replace with your MySQL username
$password = "ssmalley1"; // Replace with your MySQL password
$database = "ssmalley1"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if goals table exists, if not, create it
$sql_create_table = "CREATE TABLE IF NOT EXISTS goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    expected_completion_date DATE NOT NULL
)";

if ($conn->query($sql_create_table) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Prepare and execute SQL query to fetch goals
$sql_fetch_goals = "SELECT * FROM goals";
$result = $conn->query($sql_fetch_goals);

if ($result->num_rows > 0) {
    // Fetch goals as associative array
    $goals = array();
    while ($row = $result->fetch_assoc()) {
        $goals[] = $row;
    }
    // Convert goals array to JSON format
    echo json_encode($goals);
} else {
    echo "No goals found.";
}

// Close the connection
$conn->close();
?>
