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

// Prepare and execute SQL query to fetch distinct tags
$sql = "SELECT DISTINCT tag FROM Tasks"; // Assuming 'Tasks' is the name of your tasks table
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $tags = array();
    while ($row = $result->fetch_assoc()) {
        $tags[] = $row['tag'];
    }
    echo json_encode($tags);
} else {
    echo "No tags found.";
}

// Close the connection
$conn->close();
?>
