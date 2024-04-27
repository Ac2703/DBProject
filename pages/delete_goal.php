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

// Get goal ID from the request
$goalId = $_POST['id'];

// SQL to delete goal
$sql = "DELETE FROM goals WHERE id=$goalId";

if ($conn->query($sql) === TRUE) {
    echo "Goal deleted successfully";
} else {
    echo "Error deleting goal: " . $conn->error;
}

// Close the connection
$conn->close();

?>
