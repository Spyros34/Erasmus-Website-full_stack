<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="stylesheet" href="./styles/style_index.css">
<link rel="stylesheet" href="./styles/navbar_footer.css">

<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>

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

        echo '<!--Navbar-->
        <nav class="navbar">
            <ul class="menu">
                <li class="logo"> <a href="index.php"><img class="uni_logo" src="./media/img/university-logo.svg" class="uni_logo" alt="Logo image" /></a></li>
                <li class="item"><a href="index.php">Αρχική</a></li>
                <li class="item"><a href="more.php">Περισσότερα</a></li>
                <li class="item"><a href="reqs.php">Ελάχιστες Απαιτήσεις</a></li>
                <li class="item button"><a href="login.php">Είσοδος</a></li>
                <li class="item button secondary"><a href="sign-up.php">Εγγραφή</a></li>
                <li class="toggle"><span class="bars"></span></li>
            </ul>
        </nav>
        ';

       
    } else {

        require_once("db_credentials.php");
        $con = mysqli_connect($db_server_name, $db_username, $db_pass);
    
        $username = $_SESSION["username"];

        if (!$con) {
            echo "problem in the connection: " . mysqli_connect_error();
        } else {
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
                        echo '<!--Navbar-->
                        <nav class="navbar">
                            <ul class="menu">
                                <li class="logo"> <a href="index.php"><img class="uni_logo" src="./media/img/university-logo.svg" class="uni_logo" alt="Logo image" /></a></li>
                                <li class="item"><a href="index.php">Αρχική</a></li>
                                <li class="item"><a href="reg_user_more.php">Περισσότερα</a></li>
                                <li class="item"><a href="reg_user_reqs.php">Ελάχιστες Απαιτήσεις</a></li>
                                </li>
                                <li class="item"><a href="application.php">Αίτηση</a></li>
                                <li class="item"><a href="reg_user_profile.php"><img class="profile" src="./media/img/profile_icon.svg" class="profile" alt="profile image" /></a></li>
                                <li class="toggle"><span class="bars"></span></li>
                            </ul>
                        </nav>
                        ';
                    }else if ($user_type == '1'){
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
    
                }
            }
        }
    }


?>

<!--Content-->
<section>
    <div class="container">
    <div class="left"></div>
    <div class="right">
        <div class="content">
        <h1>Καλωσήρθατε στο πρόγραμμα Erasmus+!</h1>
        <p>Το πρόγραμμα Erasmus+ είναι μια μοναδική ευκαιρία για φοιτητές και νέους επαγγελματίες να αποκτήσουν διεθνείς εμπειρίες και να εμβαθύνουν στις γνώσεις τους. Μέσω του προγράμματος Erasmus+, οι συμμετέχοντες έχουν την ευκαιρία να σπουδάσουν ή να κάνουν πρακτική άσκηση σε ένα ξένο πανεπιστήμιο ή επιχείρηση.Επιπλέον, οι συμμετέχοντες έχουν τη δυνατότητα να γνωρίσουν νέους ανθρώπους από διαφορετικές χώρες, να βιώσουν νέους πολιτισμούς και να βελτιώσουν τις γλωσσικές τους δεξιότητες. Το πρόγραμμα Erasmus+ είναι μια εξαιρετική ευκαιρία για όσους επιθυμούν να αναπτύξουν το προσωπικό και επαγγελματικό τους προφίλ, να εμπλουτίσουν τις γνώσεις τους και να βελτιώσουν τις προοπτικές τους για το μέλλον.</p>
        </div>
    </div>
    </div>
</section>


<footer class="footer">
    <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
</footer>  

</body>

</html>


