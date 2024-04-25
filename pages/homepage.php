<?php
session_start();
    // Retrieve the value of $loggedInUser from the cookie set in login.php
    $loggedInUser = isset($_COOKIE['loggedInUser']) ? $_COOKIE['loggedInUser'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <div id="header3">
        <div class="user-info">
            <span>Welcome, <?php echo $loggedInUser; ?>!</span>
            <a href="../php/logout.php">Sign Out</a>
        </div>
    </div>
    <div id="yuh">
        <h2>Homepage</h2>
        <div class="button-container">
            <a href="taskview.html" class="button">Task View</a>
            <a href="calendar.html" class="button">Calendar View</a>
        </div>
    </div>
</body>
</html>
