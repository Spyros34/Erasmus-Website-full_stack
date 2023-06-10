<?php
session_start();

// Check if the logout button was clicked
if (isset($_POST['logout'])) {
    // Destroy the session
    session_destroy();
    
    // Redirect the user to the login page or any other desired page
    header("Location: login.php");
    exit();
}
?>
