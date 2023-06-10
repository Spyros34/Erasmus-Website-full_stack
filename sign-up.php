<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="stylesheet" href="./styles/style_sign-up.css">
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

        $redirectUrl = "index.php";
        echo ' <script>
            window.location.href = "' . $redirectUrl . '";
        </script>';
        exit();
      
    }else 
    {
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
    }
    

?>

<div class="container2">
    <div class="content-section"> 
        <div class="card">
            <div class="h2_first">
                <h2>Εγγραφή</h2> 
            </div> 
            <p class="par">Συμπληρώστε τα παρακάτω πεδία για να κάνετε εγγραφή.</p>
            <form id="signup_form" name="signup_form" action="post_signup_data.php" method="post" onsubmit="return validateForm()">
                <div class="field1">
                    <h1 class="h1_field">Όνομα:</h1>
                    <input type="text" id="nameField" name="fname" pattern="[^\d]+" required><br><br>
                </div>
                <div class="field">
                    <h1 class="h1_field">Επίθετο:</h1>
                    <input type="text" id="surnameField" name="lname" pattern="[^\d]+" required><br><br>
                </div>
                <div class="field">
                    <h1 class="h1_field">Αριθμός Μητρώου:</h1>
                    <input type="text" id="a_mField" name="a_m" maxlength="13" pattern="^(2022|2024|2025)\d{9}$" required><br><br>
                </div>
                <div class="field">
                    <h1 class="h1_field">Τηλέφωνο:</h1>
                    <input type="tel" id="mobileField" name="tel" minlength="10" maxlength="10" required><br><br>
                </div>
                <div class="field">
                    <h1 class="h1_field">Email:</h1>
                    <input type="email" id="emailField" name="email" required><br><br>
                </div>
                <div class="field">
                    <h1 class="h1_field">Username:</h1> <!-- Database check -->
                    <input type="text" id="usernameField" name="username" required><br><br>
                </div>
                <div class="field">
                    <h1 class="h1_field">Password:</h1>
                    <input type="password" id="passwordField" name="password" minlength="5" pattern="^(?=.*[!#$@%&*])[a-zA-Z0-9!#$@%&*]+$" required><br><br>
                </div>
                <div class="field">
                    <h1 class="h1_field">Confirm Password:</h1>
                    <input type="password" id="confirmPasswordField" name="confirmPassword" oninput="checkPasswordMatch()" required><br><br>
                    <p id="passwordMatchError" class="error-message">Οι κωδικοί πρόσβασης δεν ταιριάζουν.</p>
                </div>
                <input type="submit" value="Εγγραφή"> 
            </form>
        </div>
    </div>
</div>

<footer class="footer">
    <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
</footer>   

<script>
    var passwordField = document.getElementById('passwordField');
    var confirmPasswordField = document.getElementById('confirmPasswordField');
    var passwordMatchError = document.getElementById('passwordMatchError');
    var signupForm = document.getElementById('signup_form');

    function checkPasswordMatch() {
        var password = passwordField.value;
        var confirmPassword = confirmPasswordField.value;

        if (password !== confirmPassword) {
            passwordMatchError.style.display = 'block';
            confirmPasswordField.classList.add('error');
        } else {
            passwordMatchError.style.display = 'none';
            confirmPasswordField.classList.remove('error');
        }
    }

    function validateForm() {
        var password = passwordField.value;
        var confirmPassword = confirmPasswordField.value;

        if (password !== confirmPassword) {
            passwordMatchError.style.display = 'block';
            confirmPasswordField.classList.add('error');
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
</script>
