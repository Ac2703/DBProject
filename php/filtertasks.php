
<?php
// Database connection parameters
$servername = "localhost";
$username = "ssmalley1"; // Replace with your MySQL username
$password = "ssmalley1"; // Replace with your MySQL password
$database = "ssmalley1"; // Replace with your database name

// Establishing connection to the database
$conn = new mysqli($servername, $username, $password, $database);


// FILTERING TASKS
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Set parameters and execute
        // By Due Date 
        $due_date_before_target = $_POST["due_date_before_target"];
        $due_date_after_target= $_POST["due_date_after_target"];

        // By Tag
        $tag_existence = $_POST["tag_existence"];
        $tag_targets = $_POST["tag_targets"];

        // By Status
        $status_value = $_POST["status_value"];

        //GROUP BY COLUMN
        $group_column = $_POST["group_column"];

        // SQL query to filter tasks 

        $sql_filter = "SELECT * FROM Tasks;";
        // $sql_filter = "SELECT * FROM Tasks 
        // WHERE 
        //     ('$due_date_before_target' IS NULL OR due_date <= '$due_date_before_target')
        // AND ('$due_date_after_target' IS NULL OR due_date >= '$due_date_after_target')
        // AND ('$tag_existence' IS NULL 
        //     OR ('$tag_existence' = 'IN' AND tag IN ('$tag_targets'))
        //     OR ('$tag_existence' = 'NOT IN' AND tag NOT IN ('$tag_targets')))
        // AND ('$status_value' IS NULL OR status = '$status_value');";

        $result = $conn->query($sql_filter);

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
    } 


$conn->close();

// Return tasks as JSON
header('Content-Type: application/json');
echo json_encode($tasks);
?>

    