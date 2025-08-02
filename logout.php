<?php
session_start(); // Start the session

if (isset($_SESSION['uname'])) {
    // Unset all of the session variables
    session_unset();

    // Destroy the session
    session_destroy();
}

// Redirect to the login page after logout
header("Location: sign-in.html");
exit();
?>
