<?php
    require_once("db_credentials.php");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="stylesheet" href="./styles/admin_control_panel.css">
<link rel="stylesheet" href="./styles/navbar_footer.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script>
    $(function() {
        $(".toggle").on("click", function() {
            if ($(".item").hasClass("active")) {
                $(".item").removeClass("active");
            } else {
                $(".item").addClass("active");
            }
        });
    });
</script>
</head>

<body>

<?php

   // Start a session
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {

        $redirectUrl = "login.php";
        echo ' <script>
            window.location.href = "' . $redirectUrl . '";
        </script>';
        exit();

       
    } else {
        $con = mysqli_connect($db_server_name,$db_username,$db_pass);
        $username = $_SESSION['username'];
        if (!$con) {
            echo "problem in the connection: " . mysqli_connect_error();
        }else {
            mysqli_select_db($con, $db_name);
            $query = "SELECT user_id FROM Users WHERE username = '$username'";
            $result = mysqli_query($con, $query);
            if (!$result) {
                mysqli_close($con);  
                echo "query error: " . mysqli_error($con);
            } else {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $user_id = $row['user_id'];
                }

                $query = "SELECT user_type FROM User_t WHERE user_type_id = '$user_id'";
                $result = mysqli_query($con, $query);
                if (!$result) {
                    mysqli_close($con);  
                    echo "query error: " . mysqli_error($con);
                } else {
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $user_type = $row['user_type'];
                    }
                    
                    if ($user_type == '0')
                    {
                        mysqli_close($con);  
                        $redirectUrl = "login.php";
                        echo ' <script>
                            window.location.href = "' . $redirectUrl . '";
                        </script>';
                        exit();
                    }

                }
            }
        }
        
        echo '<!--Navbar-->
        <nav class="navbar">
            <ul class="menu">
                <li class="logo"> <a href="index.php"><img class="uni_logo" src="./media/img/university-logo.svg" class="uni_logo" alt="Logo image" /></a></li>
                <li class="item"><a href="index.php">Αρχική</a></li>
                <li class="item"><a href="reg_user_more.php">Περισσότερα</a></li>
                <li class="item"><a href="reg_user_reqs.php">Ελάχιστες Απαιτήσεις</a></li>
                </li>
                <li class="item"><a href="admin_control_panel.php">Πίνακας ελέγχου</a></li>
                <li class="item"><a href="reg_user_profile.php"><img class="profile" src="./media/img/profile_icon.svg" class="profile" alt="profile image" /></a></li>
                <li class="toggle"><span class="bars"></span></li>
            </ul>
        </nav>
        ';
  

    }


?>





<div class="container2">
        <div class="content-section"> 

            <div class="card">
                <input id="ch1" type="checkbox">
                <input id="ch2" type="checkbox">
                <input id="ch3" type="checkbox">
                <input id="ch4" type="checkbox">
                <input id="ch5" type="checkbox">
                <div class="h2_first">
                    <h2>Πίνακας Ελέγχου</h2> 
                </div> 

                <div class="date-dropdown1"> 
                    <label for="ch1">
                        <p>Περίοδος Αιτήσεων <img class="edit_icon" src="./media/img/calendar.svg" alt="Edit"></p>
                        
                    </label>
                    <div class="date-info">
                        <form>
                            <p class="h1 par_button">Καθορισμός έναρξης και λήξης της περιόδου αιτήσεων</p>
                            <p class="par_1">Έναρξη:</p>
                            <input type="date" class="date-input" id="fromDate" name="fromDate" min="<?= date('Y-m-d') ?>">
                            <p class="par_1">λήξη:</p>
                            <input type="date" class="date-input" id="toDate" name="toDate" min="<?= date('Y-m-d') ?>"><br>
                            <button class="submit-button" onclick="validateDates(event)">Καθορισμός</button>
                            <div class="disable_indicator">
                                <button class="disable-button" onclick="disableDates(event)">Disable </button>
                                <div id="statusCircle" class="status-circle"></div>
                            </div>
                            <div id="message" class="message"></div>
                        </form>
                    </div>
                </div>

                <div class="date-dropdown2"> 
                    <label for="ch2">
                        <p>Αιτήσεις <img class="edit_icon" src="./media/img/form.svg" alt="Edit"></p>
                    </label>
                    <div class="date-info2">
                        <p class="h1 par_button">Ακολουθούν όλες οι διαθέσιμες αιτήσεις</p>
                        <div class="date-info2">

                            <div id="application-list">
                               
                            </div>

                            <div id="message2" class="message"></div>
                            

                        </div>

                    </div>
                </div>

                <div class="date-dropdown3"> 
                    <label for="ch3">
                        <p>Δεκτές Αιτήσεις <img class="edit_icon" src="./media/img/checked_form.svg" alt="Edit"></p>
                    </label>
                    <div class="date-info3">
                        <p class="h1 par_button">Καθορισμός έναρξης και λήξης της περιόδου αιτήσεων</p>
                        <p class="par">Περίοδος Αιτήσεων</p>
                    </div>
                </div>

                <div class="date-dropdown4"> 
                    <label for="ch4">
                        <p>Συνεργαζόμενα Πανεπιστήμια <img class="edit_icon" src="./media/img/universities_icon.svg" alt="Edit"></p>
                    </label>
                    <div class="date-info4">
                        <p class="h1 par_button">Καθορισμός έναρξης και λήξης της περιόδου αιτήσεων</p>
                        <p class="par">Περίοδος Αιτήσεων</p>
                    </div>
                </div>

                <div class="date-dropdown5"> 
                    <label for="ch5">
                        <p>Διαχειριστές <img class="edit_icon" src="./media/img/admin_settings.svg" alt="Edit"></p>
                    </label>
                    <div class="date-info5">
                        <p class="h1 par_button">Καθορισμός έναρξης και λήξης της περιόδου αιτήσεων</p>
                        <p class="par">Περίοδος Αιτήσεων</p>
                    </div>
                </div>

            </div>
        </div>
</div>


<footer class="footer">
    <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
</footer>  

</body>

</html>

<script>
    function showMessage(message, messageType) {
        var messageElement = document.getElementById('message');
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

    function validateDates(event) {
        event.preventDefault();

        var fromDate = document.getElementById("fromDate").value;
        var toDate = document.getElementById("toDate").value;

        if (fromDate > toDate) {
            showMessage('Μη έγκυρη ημερομηνία, δοκιμάστε ξανά.', 'error');
            return false;
        }

        // Perform further validation or submit the form
        // ...
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                // Handle the response from the PHP script
                var response = this.responseText;
                if (response === 'success') {
                    showMessage('Η ημερομηνία καθορίστηκε επιτυχώς', 'success');
                    updateStatusCircle('green'); // Update circle to red for disabled date
                } else {
                    showMessage('Σφάλμα κατά την επεξεργασία της ημερομηνίας', 'error');
                }
            }
        };
        xhttp.open("POST", "process_dates.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("fromDate=" + encodeURIComponent(fromDate) + "&toDate=" + encodeURIComponent(toDate));
        
    }


    function updateStatusCircle(colorClass) {
        var statusCircle = document.getElementById('statusCircle');
        statusCircle.className = 'status-circle ' + colorClass;
    }

    function disableDates(event) {
        event.preventDefault();

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4) {
            if (this.status === 200) {
                var response = this.responseText;
                if (response === 'success') {
                showMessage('Η ημερομηνία απενεργοποιήθηκε επιτυχώς', 'success');
                updateStatusCircle('red'); // Update circle to red for disabled date
                } else {
                showMessage('Σφάλμα κατά την απενεργοποίηση της ημερομηνίας', 'error');
                }
            } else {
                showMessage('Σφάλμα κατά την αποστολή του αιτήματος', 'error');
            }
            }
        };
        xhttp.onerror = function() {
            showMessage('Σφάλμα κατά την επικοινωνία με τον διακομιστή', 'error');
        };
        xhttp.open("POST", "disable_dates.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();
    }

    window.addEventListener('DOMContentLoaded', function() {
        // Perform an AJAX request to get the enable status from the database
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                var enableStatus = this.responseText;
                updateStatusCircle(enableStatus);
            }
        };
        xhttp.open("GET", "get_enable_status.php", true);
        xhttp.send();

        function updateStatusCircle(enableStatus) {
            var statusCircle = document.getElementById("statusCircle");

            // Update the class of the status circle based on the enable status
            if (enableStatus === '1') {
                statusCircle.className = "status-circle green";
            } else {
                statusCircle.className = "status-circle red";
            }
        }
    });




</script>


<script>
  $(document).ready(function() {
    // Function to load applications
    function loadApplications() {
        $.ajax({
            url: "load_applications_ajax.php",
            method: "GET",
            success: function(response) {
                $("#application-list").html(response);
              
            },
            error: function() {
                $("#application-list").html("<p>An error occurred while loading the applications.</p>");
              
            }
        });
    }

    // Call the function to load applications when the page loads
    loadApplications();

    
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


</script>