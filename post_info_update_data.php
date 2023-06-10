<?php
    session_start();

    if (!isset($_SESSION['username'])) {

        $redirectUrl = "login.php";
        echo ' <script>
            window.location.href = "' . $redirectUrl . '";
        </script>';
        exit();

    }else 
    {
        //update user info 
    }
?>