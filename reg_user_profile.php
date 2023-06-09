<?php
    require_once("db_credentials.php");
?>

<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="stylesheet" href="./styles/style_profile.css">
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
    if (isset($_SESSION['username'])) {

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

       
        $con = mysqli_connect($db_server_name,$db_username,$db_pass);
    
        $username = "nick_tsel";
        $name = "";
        $surname = "";
        $am = "";
        $phone = "";
        $email = "";
        
        if (!$con) {
            echo "problem in the connection: " . mysqli_connect_error();
        } else {
            mysqli_select_db($con, $db_name);
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($con, $query);
            if (!$result) {
                echo "query error: " . mysqli_error($con);
            } else {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $name = $row['fname'];
                    $surname = $row['lname'];
                    $am = $row['a_m'];
                    $phone = $row['tel'];
                    $email = $row['email'];
                } else {
                    echo "No results found for the username: $username";
                }
            }
            
        }
  
        mysqli_close($con);  

    }


?>





<div class="container2">
        <div class="content-section"> 

            <div class="card">
                <input id="ch1" type="checkbox">
                <div class="h2_first">
                    <h2>Προφίλ
                        <label for="ch1">
                            <img class="edit_icon" src="./media/img/edit_icon.svg" alt="Edit">
                        </label>
                    </h2> 
                </div> 
                <p class="par">Μπορείτε να κάνετε αλλαγές σε οποιοδήποτε απο τα παρακάτω στοιχεία.</p>
                <div class="user-info">
                    <div class="card-info">
                        <span class="field">Username :</span>
                            <span class="field_answ"><?php echo $username; ?></span><br>
                            <span class="field">Name :</span>
                            <span class="field_answ"><?php echo $name; ?></span><br>
                            <span class="field">Surname :</span>
                            <span class="field_answ"><?php echo $surname; ?></span><br>
                            <span class="field">AM :</span>
                            <span class="field_answ"><?php echo $am; ?></span><br>
                            <span class="field">Phone :</span>
                            <span class="field_answ"><?php echo $phone; ?></span><br>
                            <span class="field">Email :</span>
                            <span class="field_answ"><?php echo $email; ?></span><br>
                    </div>
                </div>
                <div class="change-info">
                    <div class="card1-info">
                        <div class="edit">
                        <form id="info_form" name="info_form" action="post_info_update_data.php" method="post">
                            <div class="field1">
                                <h1 class="h1_field">Όνομα:</h1>
                                <input type="text" id="nameField" name="name"  placeholder="<?php echo $name; ?>" pattern="[^\d]+" ><br><br>

                            </div>
                            <div class="field">
                                <h1 class="h1_field">Επίθετο:</h1>
                                <input type="text" id="surnameField" name="surname" placeholder=<?php echo $surname; ?> pattern="[^\d]+" ><br><br>
                            </div>

                            <div class="field">
                                <h1 class="h1_field">Αριθμός Μητρώου:</h1>
                                <input type="text" id="surnameField" name="surname" placeholder=<?php echo $am; ?> maxlength="13" pattern="^(2022|2024|2025)\d{9}$" ><br><br>
                            </div>

                            <div class="field">
                                <h1 class="h1_field">Τηλέφωνο:</h1>
                                <input type="tel" id="mobileField" name="mobile" placeholder=<?php echo $phone; ?> minlength="10" maxlength="10" ><br><br>
                            </div>

                            <div class="field">
                                <h1 class="h1_field">Password:</h1>
                                <input type="password" id="passwordField" name="password" minlength="5" pattern="^(?=.*[!#$@%&*])[a-zA-Z0-9!#$@%&*]+$" ><br><br>
                            </div>

                            <div class="field">
                                <h1 class="h1_field">Confirm-Password:</h1>
                                <input type="password" id="confirmPasswordField" name="confirmPassword" oninput="checkPasswordMatch()" ><br><br>
                                <p id="passwordMatchError" class="error-message">Οι κωδικοί πρόσβασης δεν ταιριάζουν.</p>
                            </div>

                            <input type="submit" value="Save"> 
                            
                        </form>
                            
                        </div>
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
    var passwordField = document.getElementById('passwordField');
    var confirmPasswordField = document.getElementById('confirmPasswordField');
    var passwordMatchError = document.getElementById('passwordMatchError');

    function checkPasswordMatch() {
        var password = passwordField.value;
        var confirmPassword = confirmPasswordField.value;

        if (password !== confirmPassword) {
            passwordMatchError.style.display = 'block';
        } else {
            passwordMatchError.style.display = 'none';
        }
    }
</script>

