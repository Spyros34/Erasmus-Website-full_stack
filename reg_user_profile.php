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

        $name = "";
        $surname = "";
        $a_m = "";
        $phone = "";
        $email = "";
        
        if (!$con) {
            echo "problem in the connection: " . mysqli_connect_error();
        } else {
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($con, $query);
            if (!$result) {
                echo "query error: " . mysqli_error($con);
            } else {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $name = $row['fname'];
                    $surname = $row['lname'];
                    $a_m = $row['a_m'];
                    $phone = $row['tel'];
                    $email = $row['email'];
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
                            <span class="field_answ"><?php echo $a_m; ?></span><br>
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
                                <input type="text" id="a_mField" name="a_m" placeholder=<?php echo $a_m; ?> maxlength="13" pattern="^(2022|2024|2025)\d{9}$" ><br><br>
                            </div>

                            <div class="field">
                                <h1 class="h1_field">Τηλέφωνο:</h1>
                                <input type="tel" id="mobileField" name="mobile" placeholder=<?php echo $phone; ?> minlength="10" maxlength="10" ><br><br>
                            </div>

                            <div class="field">
                                <h1 class="h1_field">Email:</h1>
                                <input type="email" id="emailField" name="email" placeholder=<?php echo $email; ?>><br><br>
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

                <div class="logout">
                <form  action="logout.php" method="post">
                    <button class="logout_button" type="submit" name="logout">Logout</button>
                </form>
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
    var infoForm = document.getElementById('info_form');

    function checkPasswordMatch() {
        var password = passwordField.value;
        var confirmPassword = confirmPasswordField.value;

        if (password !== confirmPassword) {
            passwordMatchError.style.display = 'block';
            confirmPasswordField.classList.add('error');
            infoForm.setAttribute('onsubmit', 'return false;');
        } else {
            passwordMatchError.style.display = 'none';
            confirmPasswordField.classList.remove('error');
            infoForm.removeAttribute('onsubmit');
        }
    }

</script>

