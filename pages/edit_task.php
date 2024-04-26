<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <div class="header">
        <h2>Edit Task</h2>
    </div>

    <div class="container">
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

            // Check if task ID is provided in the URL
            if (isset($_GET['id'])) {
                $taskId = $_GET['id'];

                // Check if the form is submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Get form data
                    $dueDate = $_POST['dueDate'];
                    $tag = $_POST['tag'];
                    $description = $_POST['description'];
                    $status = $_POST['status'];

                    // Prepare and execute SQL query to update task
                    $sql = "UPDATE Tasks SET due_date='$dueDate', tag='$tag', description='$description', status='$status' WHERE TaskID=$taskId";
                    if ($conn->query($sql) === TRUE) {
                        echo "Task updated successfully.";
                        header("Location: taskview.html");
                    } else {
                        echo "Error updating task: " . $conn->error;
                    }
                }

                // Fetch task details from the database
                $sql = "SELECT * FROM Tasks WHERE TaskID = $taskId";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $task = $result->fetch_assoc();
        ?>
        <form action="" method="POST">
            <input type="hidden" name="taskId" value="<?php echo $task['TaskID']; ?>">
            <label for="dueDate">Due Date:</label>
            <input type="date" id="dueDate" name="dueDate" value="<?php echo $task['due_date']; ?>"><br><br>

            <label for="tag">Tag:</label>
            <input type="text" id="tag" name="tag" value="<?php echo $task['tag']; ?>"><br><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="50"><?php echo $task['description']; ?></textarea><br><br>

            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="complete" <?php if ($task['status'] == 'complete') echo 'selected'; ?>>Complete</option>
                <option value="in progress" <?php if ($task['status'] == 'in progress') echo 'selected'; ?>>In Progress</option>
                <option value="not started" <?php if ($task['status'] == 'not started') echo 'selected'; ?>>Not Started</option>
            </select><br><br>

            <input type="submit" value="Update Task">
        </form>
        <?php
                } else {
                    echo "Task not found.";
                }
            } else {
                echo "Task ID not provided.";
            }

            // Close the connection
            $conn->close();
        ?>
    </div>
</body>
</html>
