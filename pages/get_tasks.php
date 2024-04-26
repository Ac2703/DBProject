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

// Fetch unique tag values from the database
$sql = "SELECT DISTINCT tag FROM Tasks";
$result = $conn->query($sql);

// Store unique tag values in an array
$unique_tags = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $unique_tags[] = $row['tag'];
    }
}

// Fetch all tasks and their due dates from the database
$sql = "SELECT task_name, due_date, tag, description, status FROM Tasks";
$result = $conn->query($sql);

$tasks = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tasks[] = array(
            'name' => $row['task_name'],
            'dueDate' => $row['due_date'],
            'tag' => $row['tag'],
            'desc' => $row['description'],
            'status' => $row['status']
        );
    }
}

// Close the connection
$conn->close();

// Return tasks as JSON
// Return tasks and unique tag values as JSON
$response = array(
    'tasks' => $tasks,
    'tags' => $unique_tags
);

header('Content-Type: application/json');
echo json_encode($response);

?>