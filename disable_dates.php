<?php
    // Include the necessary configuration and connection settings
    // ...
    // Start a session
    session_start();
    require_once("db_credentials.php");

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        // Redirect to login page or display an error message
        echo 'error';
        exit();
    }

    // Perform database connection
    $con = mysqli_connect($db_server_name, $db_username, $db_pass, $db_name);

    if (!$con) {
    // Handle connection error
    echo 'error';
    } else {
        // Construct the SQL query to update the record
        $query = "UPDATE dates SET enable = 0";

        // Execute the query
        $result = mysqli_query($con, $query);

        if ($result) {
            mysqli_close($con);
            echo 'success';
        }else {
            // Handle query error
            // Close the database connection
            mysqli_close($con);
            echo 'error';
        }
    }
?>
