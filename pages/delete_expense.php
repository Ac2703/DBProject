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

// Check if expense ID is received via POST
if (isset($_POST['id'])) {
    // Sanitize the input to prevent SQL injection
    $expenseId = $_POST['id'];

    // Prepare and execute SQL query to delete expense
    $sql = "DELETE FROM expenses WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $expenseId); // "i" indicates integer type
    if ($stmt->execute()) {
        // Expense deletion successful
        http_response_code(200);
        echo "Expense deleted successfully";
    } else {
        // Expense deletion failed
        http_response_code(500);
        echo "Failed to delete expense";
    }
} else {
    // Invalid request
    http_response_code(400);
    echo "Invalid request";
}

// Close the connection
$conn->close();
?>
