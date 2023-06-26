<?php
require_once("db_credentials.php");

// Connect to the database
$con = mysqli_connect($db_server_name, $db_username, $db_pass);
mysqli_select_db($con, $db_name);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['applications'])) {
        $selectedApplications = $_POST['applications'];

        if (!empty($selectedApplications)) {
            $tickBoxValue = 1; // Set the tick box value to 1

            // Update the tick_box value for selected applications
            $applicationIds = implode(',', array_map('intval', $selectedApplications));
            $updateQuery = "UPDATE applications SET tick_box = $tickBoxValue WHERE application_id IN ($applicationIds)";
            $result = mysqli_query($con, $updateQuery);

            if ($result) {
                echo "success"; // Send a success response back to the Ajax call
            } else {
                echo "error"; // Send an error response back to the Ajax call
            }
        }
    }
}

// Close the database connection
mysqli_close($con);
?>
