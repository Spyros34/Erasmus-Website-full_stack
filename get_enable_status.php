<?php
    // Include the necessary configuration and connection settings
    // ...
    // Start a session
    session_start();
    require_once("db_credentials.php");

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        // Handle the case when the user is not logged in
        echo '0';
        exit();
    } else {
        $con = mysqli_connect($db_server_name, $db_username, $db_pass);
        if (!$con) {
            // Handle the case when there is an error in database connection
            echo '0';
            exit();
        } else {
            mysqli_select_db($con, $db_name);
            $query = "SELECT enable FROM dates LIMIT 1";
            $result = mysqli_query($con, $query);
            if (!$result) {
                // Handle the case when there is an error in executing the query
                mysqli_close($con);
                echo '0';
                exit();
            } else {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $enableStatus = $row['enable'];
                    echo $enableStatus;
                } else {
                    // Handle the case when there are no records in the table
                    echo '0';
                }
            }
        }
        mysqli_close($con);
    }
?>
