<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <div class="header">
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
            <a href="expenses.html" class="button">Expense View</a>
            <a href="goals.html" class="button">Goal View</a>
        </div>
        <div id="updates">
            <!-- Updates will be displayed here -->
        </div>
    </div>

    <script>
        // Function to fetch updates using AJAX
        function fetchUpdates() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var updates = JSON.parse(xhr.responseText);
                        displayUpdates(updates);
                    } else {
                        console.error('Failed to fetch updates');
                    }
                }
            };
            xhr.open('GET', 'fetch_updates.php', true);
            xhr.send();
        }
        // Function to display updates
        function displayUpdates(updates) {
            var updatesDiv = document.getElementById('updates');
            if (updates.length > 0) {
                var html = '<h3>Updates</h3><ul>';
                updates.forEach(function(update) {
                    html += '<li>';
                    // Loop through each key-value pair in the update
                    Object.keys(update).forEach(function(key) {
                        // Check if the value is not null
                        if (update[key] !== null) {
                            html += '<strong>' + key + ':</strong> ' + update[key] + '<br>';
                        }
                    });
                    html += '</li>';
                });
                html += '</ul>';
                updatesDiv.innerHTML = html;
            } else {
                updatesDiv.innerHTML = '<p>No updates for today</p>';
            }
        }

        // Fetch updates when the page loads
        document.addEventListener('DOMContentLoaded', function () {
            fetchUpdates();
        });

    </script>
</body>
</html>
