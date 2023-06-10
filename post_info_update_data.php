<?php
    session_start();
    require_once("db_credentials.php");

    if (!isset($_SESSION['username'])) {

        $redirectUrl = "login.php";
        echo ' <script>
            window.location.href = "' . $redirectUrl . '";
        </script>';
        exit();

    }else 
    {
        //update user info 
        // Establish database connection
        $con = mysqli_connect($db_server_name,$db_username,$db_pass);
        mysqli_select_db($con, $db_name);
        $username = $_SESSION["username"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $a_m = $_POST["a_m"];
        $mobile = $_POST["mobile"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        $query = "UPDATE Users
        SET fname = IF('$name' <> '', '$name', fname),
            lname = IF('$surname' <> '', '$surname', lname),
            a_m = IF('$a_m' <> '', '$a_m', a_m),
            tel = IF('$mobile' <> '', '$mobile', tel),
            password = IF('$password' <> '', '$password', password),
            email = IF('$email' <> '', '$email', email)
        WHERE username = '$username';
        ";

        $result = mysqli_query($con, $query);

        if (!$result) {
            echo "query error: " . mysqli_error($con);
        }

        mysqli_close($con);

        $redirectUrl = "reg_user_profile.php";
        echo ' <script>
            window.location.href = "' . $redirectUrl . '";
        </script>';
        exit();

    }
?>