
<?php
// Database connection parameters
$servername = "localhost";
$username = "ssmalley1"; // Replace with your MySQL username
$password = "ssmalley1"; // Replace with your MySQL password
$database = "ssmalley1"; // Replace with your database name

// Create connection

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

    // Check if Tasks table exists, if not, create it
$sql_create_table = "CREATE TABLE IF NOT EXISTS Tasks (
    TaskID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    task_name VARCHAR(255) NOT NULL,
    due_date DATE NOT NULL,
    tag VARCHAR(255),
    description TEXT,
    status ENUM('complete', 'in progress', 'not started') NOT NULL
)";

if ($conn->query($sql_create_table) === FALSE) {
    echo "Error creating table: " . $conn->error;
}
        // Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set parameters and execute
    $task_name = $_POST["task_name"];
    $due_date = $_POST["due_date"];
    $tag = $_POST["tag"];
    $description = $_POST["description"];
    $status = $_POST["status"];
    

    // Insert account into Accounts table
    $sql_insert_account = "INSERT INTO Tasks (task_name, due_date, tag, description, status) VALUES ('$task_name', '$due_date', '$tag', '$description','$status')";
    if ($conn->query($sql_insert_account) === TRUE) {
        // Account successfully created
        echo "Account successfully created.";
        // Redirect to login page
        header("Location: ../pages/taskview.html");
        exit();
    } else {
        // Error inserting account
        echo "Error creating account: " . $conn->error;
    }
}

$conn->close();
?>

