<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <div class="header">
        <h2>Add Expense</h2>
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

            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get form data
                $date = $_POST['date'];
                $category = $_POST['category'];
                $amount = $_POST['amount'];

                // Prepare and execute SQL query to insert expense
                $sql = "INSERT INTO expenses (date, category, amount) VALUES ('$date', '$category', '$amount')";
                if ($conn->query($sql) === TRUE) {
                    // Expense successfully added
                    echo "Expense successfully added.";
                    // Redirect to expense list page
                    header("Location: expenses.html");
                    exit();
                } else {
                    // Error inserting expense
                    echo "Error adding expense: " . $conn->error;
                }
            }
        ?>

        <div id="yuh">
            <form action="" method="POST">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br><br>

                <label for="category">Category:</label>
                <input type="text" id="category" name="category" required><br><br>

                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" step="0.01" min="0" required><br><br>

                <input type="submit" value="Add Expense">
            </form>
        </div>
    </div>
</body>
</html>

<?php
    // Close the connection
    $conn->close();
?>
