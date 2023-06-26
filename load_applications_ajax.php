
<?php
require_once("db_credentials.php");

// Connect to the database
$con = mysqli_connect($db_server_name, $db_username, $db_pass);
mysqli_select_db($con, $db_name);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $selectedApplications = isset($_POST['applications']) ? $_POST['applications'] : [];

        if (!empty($selectedApplications)) {
            $tickBoxValue = 1; // Set the tick box value to 1

            // Update the tick_box value for selected applications
            $applicationIds = implode(',', array_map('intval', $selectedApplications));
            $updateQuery = "UPDATE applications SET tick_box = $tickBoxValue WHERE application_id IN ($applicationIds)";
            $result = mysqli_query($con, $updateQuery);

           
        }
    }
    exit; // Stop further execution after processing the form submission
}

// Retrieve applications from the database
$query = "SELECT Users.fname, Users.lname, applications.*, fill.application_id 
        FROM Users 
        JOIN fill ON Users.user_id = fill.user_id 
        JOIN applications ON fill.application_id = applications.application_id";
$result = mysqli_query($con, $query);

// Check if there are any applications
if (mysqli_num_rows($result) > 0) {
    echo '<form method="POST" id="application-form1">'; // Add an ID to the form
    // Iterate over each application
    while ($row = mysqli_fetch_assoc($result)) {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $passedCourses = $row['passed_courses'];
        $averagePassedCourses = $row['average_passed_courses'];
        $englishCertificate = $row['english_certificate'];
        $foreignLanguages = $row['foreign_languages'];
        $firstUni = $row['first_uni'];
        $secondUni = $row['second_uni'];
        $thirdUni = $row['third_uni'];
        $transcript = $row['transcript'];
        $englishDegree = $row['english_degree'];
        $otherDegrees = $row['other_degrees'];
        $tickBox = $row['tick_box'];
        $applicationId = $row['application_id'];

        echo '
        <div class="card">
            <div class="card-content">
                <labe class="label_names">
                    <input type="checkbox" name="applications[]" value="' . $applicationId . '">
                    <span>' . $fname . ' ' . $lname . '</span>
                </labe>
                <p>Passed Courses: ' . $passedCourses . '</p>
                <p>Average Passed Courses: ' . $averagePassedCourses . '</p>
                <p>English Certificate: ' . $englishCertificate . '</p>
                <p>Foreign Languages: ' . $foreignLanguages . '</p>
                <p>1st Choice University: ' . $firstUni . '</p>
                <p>2nd Choice University: ' . $secondUni . '</p>
                <p>3rd Choice University: ' . $thirdUni . '</p>
                <p>English Degree: <a href="' . $englishDegree . '" target="_blank">View</a></p>
                <p>Other Degrees: ';

        // Handle multiple other degrees
        $otherDegreesArray = explode(',', $otherDegrees);
        foreach ($otherDegreesArray as $degree) {
            echo '<a href="' . $degree . '" target="_blank">Degree</a> ';
        }

        echo '</p>
                <p>Transcript: <a href="' . $transcript . '" target="_blank">View</a></p>
            </div>
        </div>
        ';
    }

    echo '
    <button type="button" class="submit-button1" id="submit-button1">Submit</button>
    </form>
    ';
} else {
    echo '<p>No applications found.</p>';
}

// Close the database connection
mysqli_close($con);
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#submit-button1").on("click", function() {
        var selectedApplications = $("input[name='applications[]']:checked").map(function() {
            return this.value;
        }).get();

        if (selectedApplications.length > 0) {
            $.ajax({
                url: "admin_submit.php",
                method: "POST",
                data: { applications: selectedApplications },
                success: function(response) {
                    // Handle the response from the server
                    if (response === "success") {
                       
                        showMessage2("Applications submitted successfully", "success");
                    } else {
                       
                        showMessage2("Failed to submit applications", "error");
                    }
                },
                error: function() {
                    showMessage2("An error occurred while submitting the form.", "error");
                   
                }
            });
        } else {
            showMessage2("Please select at least one application", "error");
        }
    });

    function showMessage2(message, messageType) {
        var messageElement = document.getElementById('message2');
        messageElement.textContent = message;
        messageElement.className = 'message ' + messageType;

        messageElement.style.display = 'block';
        messageElement.style.opacity = 0;

        if (messageType === 'success') {
            messageElement.style.backgroundColor = 'rgba(40, 100, 40, 0.957)';
        } else if (messageType === 'error') {
            messageElement.style.backgroundColor = '#9e1f1fdc';
        }

        var fadeInInterval = setInterval(function() {
            messageElement.style.opacity = parseFloat(messageElement.style.opacity) + 0.05;
            if (parseFloat(messageElement.style.opacity) >= 1) {
                clearInterval(fadeInInterval);
                setTimeout(function() {
                    var fadeOutInterval = setInterval(function() {
                        messageElement.style.opacity = parseFloat(messageElement.style.opacity) - 0.05;
                        if (parseFloat(messageElement.style.opacity) <= 0) {
                            clearInterval(fadeOutInterval);
                            messageElement.style.display = 'none';
                        }
                    }, 50);
                }, 3000); // Adjust the duration (in milliseconds) here
            }
        }, 50);
    }
});
</script>
