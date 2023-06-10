<?php

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
        echo "problem in the connection: " . mysqli_connect_error();
    }else {
        mysqli_select_db($con, $db_name);

        // Prepare and execute the SELECT query
        $query_1="INSERT INTO Users (fname,lname,email,username,password,a_m,tel) VALUES('$fname','$lname','$email','$username','$password','$a_m','$tel')";
        $result=mysqli_query($con,$query_1);

        if ($result)
        {
            $user_id = mysqli_insert_id($con);

        }else {
            //error 
        }
        $query_1="INSERT INTO User_t (user_type_id,user_type) VALUES('$user_id','0')";
        $result=mysqli_query($con,$query_1);
    
        
        if ($con->query($query_1) === TRUE) {
            echo "Data inserted successfully";
        } else {
            echo "Error inserting data: " . mysqli_close($con);;
        }
        
        // Close the database connection
        mysqli_close($con); 
   
 
    }
    


?>


