<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Goal</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <div class="header">
        <h2>Edit Goal</h2>
    </div>

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

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $goalId = $_POST['id'];
        $goalName = $_POST['name'];
        $expectedCompletionDate = $_POST['expectedCompletionDate'];

        // Prepare and execute SQL query to update goal
        $sql = "UPDATE goals SET name='$goalName', expected_completion_date='$expectedCompletionDate' WHERE id=$goalId";
        if ($conn->query($sql) === TRUE) {
            // Goal successfully updated
            echo "Goal successfully updated.";
            header('Location: goals.html');
        } else {
            // Error updating goal
            echo "Error updating goal: " . $conn->error;
        }
    }

    // Check if goal ID is set in the URL
    if (isset($_GET['id'])) {
        $goalId = $_GET['id'];

        // SQL to fetch goal details
        $sql = "SELECT * FROM goals WHERE id=$goalId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $goalName = $row['name'];
            $expectedCompletionDate = $row['expected_completion_date'];
        } else {
            echo "Goal not found";
            exit;
        }
    } else {
        echo "Goal ID not provided";
        exit;
    }
    ?>

    <!-- Edit goal form -->
    <form id="editGoalForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $goalId; ?>">
        <label for="goalName">Goal:</label>
        <input type="text" id="goalName" name="name" value="<?php echo $goalName; ?>" required><br><br>
        <label for="expectedCompletionDate">Expected Completion Date:</label>
        <input type="date" id="expectedCompletionDate" name="expectedCompletionDate" value="<?php echo $expectedCompletionDate; ?>" required><br><br>
        <button type="submit" class="button">Update Goal</button>
    </form>

    <?php
    // Close the connection
    $conn->close();
    ?>
</body>
</html>
