<?php  
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    session_start();
    require_once("db_credentials.php");

    if (!isset($_SESSION["username"])) {

        $redirectUrl = "login.php";
        echo ' <script>
            window.location.href = "' . $redirectUrl . '";
        </script>';
        exit();

    }else 
    {   
        $username = $_SESSION["username"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $a_m = $_POST["a_m"];
        $passedCoursesPercentage = $_POST["passedCoursesPercentage"];
        $averageGrade = $_POST["averageGrade"];
        $certificate = $_POST["certificate"];
        $language = $_POST["language"];
        $university1 = $_POST["university1"];
        $university2 = $_POST["university2"];
        $university3 = $_POST["university3"];
        
        // File destination
        $destination = "files/";
        
        // Create a folder with the username
        $userFolder = $destination . $username . "/";
        if (!is_dir($userFolder)) {
            mkdir($userFolder);
        }
        
        if ($_FILES["transcript"]["error"] == 0) {
            $transcriptFileName = $_FILES["transcript"]["name"];
            $transcriptFilePath = $userFolder . $transcriptFileName;
            move_uploaded_file($_FILES["transcript"]["tmp_name"], $transcriptFilePath);
            // Save $transcriptFilePath in the database or perform any other operations
    
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
                            <p class="par">Κάτι πήγε λάθος με το ανέβασμα του'. $transcriptFileName .' παρακαλώ προσπαθήστε ξανά αργότερα.</p>
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
                </footer>
            ';

            $delay = 5; // Delay in seconds before redirection
            $redirectUrl = "application.php";
            echo ' <script>
                setTimeout(function() {
                    window.location.href = "' . $redirectUrl . '";
                }, ' . ($delay * 1000) . '); // Delay in milliseconds
                </script>';
            exit();
    
        }

        if ($_FILES["englishCertificate"]["error"] == 0) {
            $englishCertificateName = $_FILES["englishCertificate"]["name"];
            $englishCertificatePath = $userFolder . $englishCertificateName;
            move_uploaded_file($_FILES["englishCertificate"]["tmp_name"], $englishCertificatePath);
            // Save $englishCertificateFilePath in the database or perform any other operations
        } else {
            // Handle the case when file upload has an error
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
                            <p class="par">Κάτι πήγε λάθος με το ανέβασμα του'. $englishCertificateName .' παρακαλώ προσπαθήστε ξανά αργότερα.</p>
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
                </footer>
            ';

            $delay = 5; // Delay in seconds before redirection
            $redirectUrl = "application.php";
            echo ' <script>
                setTimeout(function() {
                    window.location.href = "' . $redirectUrl . '";
                }, ' . ($delay * 1000) . '); // Delay in milliseconds
                </script>';
            exit();
        }
        
        // Initialize an empty array to store the file destinations
        $fileDestinations = array();

        // Handle multiple files
        if (isset($_FILES["otherCertificates"])) {
            $fileCount = count($_FILES["otherCertificates"]["name"]);

            for ($i = 0; $i < $fileCount; $i++) {
                $fileName = $_FILES["otherCertificates"]["name"][$i];
                $fileTmpPath = $_FILES["otherCertificates"]["tmp_name"][$i];
                $fileDestination = $userFolder . $fileName;

                if (move_uploaded_file($fileTmpPath, $fileDestination)) {
                    // File uploaded successfully, you can save the $fileDestination in the database or perform any other operations
                    $fileDestinations[] = $fileDestination; // Add the file destination to the array
                } else {
                    // Handle the case when file upload has an error
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
                                    <p class="par">Κάτι πήγε λάθος με το ανέβασμα του'. $fileName .' παρακαλώ προσπαθήστε ξανά αργότερα.</p>
                                </div>
                            </div>
                        </div>

                        <footer class="footer">
                            <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
                        </footer>
                    ';

                    $delay = 5; // Delay in seconds before redirection
                    $redirectUrl = "application.php";
                    echo ' <script>
                        setTimeout(function() {
                            window.location.href = "' . $redirectUrl . '";
                        }, ' . ($delay * 1000) . '); // Delay in milliseconds
                        </script>';
                    exit();
                }
            }
        }

        // Convert the array of file destinations to a comma-separated string
        $fileDestinationsString = implode(",", $fileDestinations);

        // Now you can save $fileDestinationsString in the database or use it as needed
        
        // Connect to the database
        $con = mysqli_connect($db_server_name, $db_username, $db_pass);
        mysqli_select_db($con, $db_name);

        $query ="INSERT INTO applications (passed_courses,average_passed_courses,english_certificate,foreign_languages,first_uni,second_uni,third_uni,transcript,english_degree,other_degrees,tick_box) VALUES('$passedCoursesPercentage','$averageGrade','$certificate','$language','$university1','$university2','$university3','$transcriptFilePath','$englishCertificatePath','$fileDestinationsString',0)";
        $result=mysqli_query($con,$query);

        if ($result)
        {
            $application_id = mysqli_insert_id($con);  //get the application_id of the inserted application

        }else{
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
                            <p class="par">Κάτι πήγε λάθος με το ανέβασμα της φόρμας, παρακαλώ προσπαθήστε ξανά αργότερα.</p>
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
                </footer>
            ';

            $delay = 5; // Delay in seconds before redirection
            $redirectUrl = "application.php";
            echo ' <script>
                setTimeout(function() {
                    window.location.href = "' . $redirectUrl . '";
                }, ' . ($delay * 1000) . '); // Delay in milliseconds
                </script>';
            exit();

        }

        $query_1="SELECT user_id FROM Users WHERE username = '$username'";
        $result=mysqli_query($con,$query_1);

        if ($result)
        {
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['user_id'];
            $query_1 = "INSERT INTO fill (user_id,application_id) VALUES('$user_id','$application_id')";
            $result=mysqli_query($con,$query_1);
            

            if ($result)
            {

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
                                <p class="par">Η αίτηση εισήχθη με επιτυχία με επιτυχία! Γίνεστε redirect σε 5s.</p>
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
            }else{
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
                                <p class="par">Κάτι πήγε λάθος με το ανέβασμα της φόρμας, παρακαλώ προσπαθήστε ξανά αργότερα.</p>
                            </div>
                        </div>
                    </div>

                    <footer class="footer">
                        <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
                    </footer>
                ';

                $delay = 5; // Delay in seconds before redirection
                $redirectUrl = "application.php";
                echo ' <script>
                    setTimeout(function() {
                        window.location.href = "' . $redirectUrl . '";
                    }, ' . ($delay * 1000) . '); // Delay in milliseconds
                    </script>';
                exit();
            }

        }else{
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
                            <p class="par">Κάτι πήγε λάθος με το ανέβασμα της φόρμας, παρακαλώ προσπαθήστε ξανά αργότερα.</p>
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
                </footer>
            ';

            $delay = 5; // Delay in seconds before redirection
            $redirectUrl = "application.php";
            echo ' <script>
                setTimeout(function() {
                    window.location.href = "' . $redirectUrl . '";
                }, ' . ($delay * 1000) . '); // Delay in milliseconds
                </script>';
            exit();
        }

    }

?>