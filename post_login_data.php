<?php
// Start a session
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Receiving all the elements from the login form
require_once("db_credentials.php");

$username = $_POST['username'];
$password = $_POST['password'];

// Establish database connection
$con = mysqli_connect($db_server_name, $db_username, $db_pass);

if (!$con) {
    echo '
    <!DOCTYPE html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/style_post_signup.css">
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
        <!--Navbar-->
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

        <div class="container2">
            <div class="content-section"> 
                <div class="card">
                    <div class="h2_first">
                        <h2>Error</h2> 
                    </div> 
                    <p class="par">Κάτι πήγε λάθος, παρακαλώ προσπαθήστε ξανά αργότερα.</p>
                </div>
            </div>
        </div>

        <footer class="footer">
            <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
        </footer>
    ';

    $delay = 5; // Delay in seconds before redirection
    $redirectUrl = "login.php";
    echo ' <script>
        setTimeout(function() {
            window.location.href = "' . $redirectUrl . '";
        }, ' . ($delay * 1000) . '); // Delay in milliseconds
        </script>';
    exit();
} else {
    mysqli_select_db($con, $db_name);

    // Prepare and execute the SELECT query
    $query = "SELECT COUNT(*) as count FROM Users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        // Close the database connection
        mysqli_close($con);
        echo '
        <!DOCTYPE html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./styles/style_post_signup.css">
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
            <!--Navbar-->
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

            <div class="container2">
                <div class="content-section"> 
                    <div class="card">
                        <div class="h2_first">
                            <h2>Error</h2> 
                        </div> 
                        <p class="par">Κάτι πήγε λάθος, παρακαλώ προσπαθήστε ξανά αργότερα.</p>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
            </footer>
        ';

        $delay = 5; // Delay in seconds before redirection
        $redirectUrl = "login.php";
        echo ' <script>
            setTimeout(function() {
                window.location.href = "' . $redirectUrl . '";
            }, ' . ($delay * 1000) . '); // Delay in milliseconds
            </script>';
        exit();
    } else {
        $row = $result->fetch_assoc();
        $count = $row['count'];

        if ($count > 0) {
            $_SESSION["username"] = $username;

            if (isset($_COOKIE["username"])) {
                if ($_COOKIE["username"] == $_POST['username']) {
                    $_COOKIE[$password] = $_POST['password'];
                } else {
                    setcookie("username", $username, time() + (86400 * 30), "/");
                    setcookie("password", $password, time() + (86400 * 30), "/");
                }
            } else {
                setcookie("username", $username, time() + (86400 * 30), "/");
                setcookie("password", $password, time() + (86400 * 30), "/");
            }

            // Close the database connection
            mysqli_close($con);

            echo '
            <!DOCTYPE html>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="UTF-8">
            <link rel="stylesheet" href="./styles/style_post_signup.css">
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
                <!--Navbar-->
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

                <div class="container2">
                    <div class="content-section"> 
                        <div class="card">
                            <div class="h2_first">
                                <h2 class="h2_success">Success</h2> 
                            </div> 
                            <p class="par">Συνδεθήκατε με επιτυχία! Γίνεστε redirect σε 5s.</p>
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
                </footer>
            ';

            $delay = 5; // Delay in seconds before redirection
            $redirectUrl = "index.php";
            echo ' <script>
                setTimeout(function() {
                    window.location.href = "' . $redirectUrl . '";
                }, ' . ($delay * 1000) . '); // Delay in milliseconds
                </script>';
            exit();
        } else {
            // Close the database connection
            mysqli_close($con);
            echo '
            <!DOCTYPE html>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="UTF-8">
            <link rel="stylesheet" href="./styles/style_post_signup.css">
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
                <!--Navbar-->
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

                <div class="container2">
                    <div class="content-section"> 
                        <div class="card">
                            <div class="h2_first">
                                <h2>Error</h2> 
                            </div> 
                            <p class="par">Κάτι πήγε λάθος, παρακαλώ βεβαιωθείτε ότι εισάγετε τα στοιχεία σωστά.</p>
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
                </footer>
            ';

            $delay = 5; // Delay in seconds before redirection
            $redirectUrl = "login.php";
            echo ' <script>
                setTimeout(function() {
                    window.location.href = "' . $redirectUrl . '";
                }, ' . ($delay * 1000) . '); // Delay in milliseconds
                </script>';
            exit();
        }
    }
}


?>
