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
        echo "problem in the connection: " . mysqli_connect_error();
    }else {
        mysqli_select_db($con, $db_name);

        //Check if the username already exists 
        $query= "SELECT COUNT(*) as count FROM users WHERE username = '$username'";
        $result=mysqli_query($con,$query);
        $row = $result->fetch_assoc();
        $count = $row['count'];
         
        if ($count > 0) {
            echo "Username already exists. Cannot insert.";
        }else {    //the username doesn't exist 

            // Prepare and execute the insert query
            $query_1="INSERT INTO Users (fname,lname,email,username,password,a_m,tel) VALUES('$fname','$lname','$email','$username','$password','$a_m','$tel')";
            $result=mysqli_query($con,$query_1);

            if ($result)
            {
                $user_id = mysqli_insert_id($con);  //get the user_id of the inserted user 

            }else {
                //error 
            }

            $query_1="INSERT INTO User_t (user_type_id,user_type) VALUES('$user_id','0')"; // user_type = 0 for registered user ,  user_type = 1 for administrator user
            $result=mysqli_query($con,$query_1);
        
            
            if ($con->query($query_1) === TRUE) {
                echo "Data inserted successfully";
            } else {
                echo "Error inserting data: " . mysqli_close($con);;
            }
            
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

        }

    }
    


?>


