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

// Check if expenses table exists, if not, create it
$sql_create_table = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    category VARCHAR(255) NOT NULL,
    amount DECIMAL(10,2) NOT NULL
)";

if ($conn->query($sql_create_table) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Prepare and execute SQL query to fetch expenses
$sql_fetch_expenses = "SELECT * FROM expenses";
$result = $conn->query($sql_fetch_expenses);

if ($result->num_rows > 0) {
    // Fetch expenses as associative array
    $expenses = array();
    while ($row = $result->fetch_assoc()) {
        $expenses[] = $row;
    }
    // Convert expenses array to JSON format
    echo json_encode($expenses);
} else {
    echo "No expenses found.";
}

// Close the connection
$conn->close();
?>
