<?php
// Database connection parameters
$servername = "localhost";
$username = "ssmalley1"; // Replace with your MySQL username
$password = "ssmalley1"; // Replace with your MySQL password
$database = "ssmalley1"; // Replace with your database name

// Establishing connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch specific columns from goals, expenses, and Tasks tables where they are joined on their date columns
$sql = "SELECT goals.name AS goal_name, 
       expenses.category AS expense_category, 
       Tasks.task_name AS task_name
FROM goals
LEFT JOIN expenses ON goals.expected_completion_date = expenses.date
LEFT JOIN Tasks ON expenses.date = Tasks.due_date
WHERE goals.expected_completion_date = CURDATE()";

// Executing the query
$result = $conn->query($sql);

// Initialize an array to store the fetched data
$updates = array();

// Fetching data from the result set
if ($result->num_rows > 0) {
    // Fetch all rows from the result set and store them in the updates array
    while ($row = $result->fetch_assoc()) {
        $updates[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return the fetched data as JSON
header('Content-Type: application/json');
echo json_encode($updates);
?>
