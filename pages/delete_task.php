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

// Check if the task ID is received via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Sanitize the input to prevent SQL injection
    $taskId = $_POST['id'];

    // Prepare and execute the SQL query to delete the task
    $sql = "DELETE FROM Tasks WHERE TaskID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $taskId); // "i" indicates integer type
    if ($stmt->execute()) {
        // Task deletion successful
        http_response_code(200);
        echo "Task deleted successfully";
    } else {
        // Task deletion failed
        http_response_code(500);
        echo "Failed to delete task";
    }
} else {
    // Invalid request
    http_response_code(400);
    echo "Invalid request";
}

// Close the connection
$conn->close();
?>
