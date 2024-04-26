<?php
session_start();

    $loggedInUser = isset($_COOKIE['loggedInUser']) ? $_COOKIE['loggedInUser'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
<div class="header">
        <h2>AppName</h2>
    </div>
    <div id="yuh">
    <h2>Add Task</h2>
    <form action="../php/addtask.php" method="post">
        <label for="task_name">Task Name:</label><br>
        <input type="text" id="task_name" name="task_name" required><br>
        
        <label for="due_date">Due Date:</label><br>
        <input type="date" id="due_date" name="due_date" required><br>
        
        <label for="tag">Tag:</label><br>
        <input type="text" id="tag" name="tag"><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>
        
        <label for="status">Status:</label><br>
        <select id="status" name="status" required>
            <option value="complete">Complete</option>
            <option value="in progress">In Progress</option>
            <option value="not started">Not Started</option>
        </select><br><br>
        
        <input type="submit" value="Submit">
    </form>
    <br>
    <a class="button" href="taskview.html">Return to Task View</a>
</div>
</body>
</html>
