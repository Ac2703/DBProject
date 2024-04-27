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

// Get form data
$name = $_POST['name'];
$expectedCompletionDate = $_POST['expectedCompletionDate'];

// SQL to insert new goal
$sql = "INSERT INTO goals (name, expected_completion_date) VALUES ('$name', '$expectedCompletionDate')";

if ($conn->query($sql) === TRUE) {
    echo "New goal added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();

?>
