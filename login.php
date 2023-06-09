<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="stylesheet" href="./styles/style_login.css">
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
      
    }else{
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
                <h2>Είσοδος</h2> 
            </div> 
            <p class="par">Συμπληρώστε τα παρακάτω πεδία για να συνδεθείτε.</p>
            <div class="field1">
                <h1 class="h1_field">Username:</h1>
                <input type="text" id="surname" name="surname" required><br><br>
            </div>

            <div class="field">
                <h1 class="h1_field">Password:</h1>
                <input type="text" id="surname" name="surname" required><br><br>
            </div>

            <input type="submit" value="Είσοδος">   
            
        </div>
    </div>
</div>

    <footer class="footer">
        <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
    </footer>  

</body>