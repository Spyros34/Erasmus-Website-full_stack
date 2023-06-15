<?php
    // Include the necessary configuration and connection settings
    // ...
    // Start a session
    session_start();
    require_once("db_credentials.php");

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {

        $redirectUrl = "login.php";
        echo ' <script>
            window.location.href = "' . $redirectUrl . '";
        </script>';
        exit();

    
    } else {
        $con = mysqli_connect($db_server_name,$db_username,$db_pass);
        if (!$con) {
            echo 'error';
        } else {
            $fromDate = $_POST['fromDate'];
            $toDate = $_POST['toDate'];

            mysqli_select_db($con, $db_name);
            $query = "SELECT COUNT(*) AS count FROM dates";
            $result = mysqli_query($con, $query);
            if (!$result) {
                mysqli_close($con);
                echo 'error';
            } else {
                $row = mysqli_fetch_assoc($result);
                $count = $row['count'];
                if ($count > 0) {
                    
                    $query = "UPDATE dates SET date_from = '$fromDate', date_to = '$toDate' , enable = '1' LIMIT 1";

                    // Execute the query
                    $result = mysqli_query($con, $query);
                
                    if ($result) {
                        // Check if any rows were affected
                        if (mysqli_affected_rows($con) > 0) {
                            // Rows updated successfully
                            // Close the database connection
                            mysqli_close($con);
                            echo 'success';
                        } else {
                            // No matching record found or no changes made
                            // Close the database connection
                            mysqli_close($con);
                            echo 'error';
                        }
                    }else {
                        // Handle query error
                        // Close the database connection
                        mysqli_close($con);
                        echo 'error';
                    }
                    
                }else{
                    // Construct the SQL query
                    $query = "INSERT INTO dates (date_from, date_to , enable) VALUES ('$fromDate', '$toDate' , '1')";

                    // Execute the query
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        // Insertion successful
                        // Close the database connection
                        mysqli_close($con);
                        echo 'success';
                    } else {
                        // Handle query error
                        // Close the database connection
                        mysqli_close($con);
                        echo 'error';
                    }
                }
            }
        }
    }
?>
