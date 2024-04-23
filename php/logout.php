<?php
// Start the session to access session variables
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Expire the cookie by setting its expiration time to a past date
if (isset($_COOKIE['loggedInUser'])) {
    setcookie('loggedInUser', '', time() - 3600, '/');
}

// Redirect to the login page
header("Location: ../pages/loginpage.html");
exit;
?>
