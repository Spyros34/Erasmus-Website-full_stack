<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //receiving all the elements from the sign up form
    require_once("db_credentials.php");

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $a_m=$_POST['a_m'];
    $tel=$_POST['tel'];

    // Establish database connection
    $con = mysqli_connect($db_server_name,$db_username,$db_pass);
    
    if (!$con) {
        echo '<!DOCTYPE html>
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
        </footer>  ';
        
        $delay = 5; // Delay in seconds before redirection
        $redirectUrl = "sign-up.php";
        echo ' <script>
            setTimeout(function() {
                window.location.href = "' . $redirectUrl . '";
            }, ' . ($delay * 1000) . '); // Delay in milliseconds
            </script>';
        exit();
    }else {
        mysqli_select_db($con, $db_name);

        //Check if the username already exists 
        $query= "SELECT COUNT(*) as count FROM users WHERE username = '$username'";
        $result=mysqli_query($con,$query);
        $row = $result->fetch_assoc();
        $count = $row['count'];
         
        if ($count > 0) {
            // Close the database connection
            mysqli_close($con); 
            
            echo '<!DOCTYPE html>
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
                            <p class="par">Το username που δώσατε υπάρχει ήδη, παρακαλώ δώστε ένα διαφορετικό.</p>
                        </div>
                    </div>
            </div>
            
            <footer class="footer">
                <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
            </footer>  ';
            
            $delay = 5; // Delay in seconds before redirection
            $redirectUrl = "sign-up.php";
            echo ' <script>
                setTimeout(function() {
                    window.location.href = "' . $redirectUrl . '";
                }, ' . ($delay * 1000) . '); // Delay in milliseconds
                </script>';
            exit();
    
        }else {    //the username doesn't exist 

            // Prepare and execute the insert query
            $query_1="INSERT INTO Users (fname,lname,email,username,password,a_m,tel) VALUES('$fname','$lname','$email','$username','$password','$a_m','$tel')";
            $result=mysqli_query($con,$query_1);

            if ($result)
            {
                $user_id = mysqli_insert_id($con);  //get the user_id of the inserted user 

            }else {
                //error 
                // Close the database connection
                mysqli_close($con); 
        
                echo '<!DOCTYPE html>
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
                </footer>  ';
                
                $delay = 5; // Delay in seconds before redirection
                $redirectUrl = "sign-up.php";
                echo ' <script>
                    setTimeout(function() {
                        window.location.href = "' . $redirectUrl . '";
                    }, ' . ($delay * 1000) . '); // Delay in milliseconds
                    </script>';
                exit();
            }

            $query_1="INSERT INTO User_t (user_type_id,user_type) VALUES('$user_id','0')"; // user_type = 0 for registered user ,  user_type = 1 for administrator user
            $result=mysqli_query($con,$query_1);
        
            
            if ($con->query($query_1) === TRUE) {

                // Close the database connection
                mysqli_close($con); 
                
                //session 
                $_SESSION["username"] = $username ;
                
                //coockies 
                //set a cookie for 30 days and the destination of the cookie is "/"
                setcookie("username", $username, time() + (86400 * 30), "/");
                setcookie("password", $password, time() + (86400 * 30), "/");
                setcookie("fname", $fname, time() + (86400 * 30), "/");
                setcookie("lname", $lname, time() + (86400 * 30), "/");
                setcookie("email", $email, time() + (86400 * 30), "/");
                setcookie("a_m", $a_m, time() + (86400 * 30), "/");
                setcookie("tel", $tel, time() + (86400 * 30), "/");

                echo '<!DOCTYPE html>
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
                                <p class="par">Εγγραφήκατε με επιτυχία! Γίνεστε redirect σε 5s.</p>
                            </div>
                        </div>
                </div>
                
                <footer class="footer">
                    <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
                </footer>  ';
                
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
            
                echo '<!DOCTYPE html>
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
                </footer>  ';
                
                $delay = 5; // Delay in seconds before redirection
                $redirectUrl = "sign-up.php";
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
