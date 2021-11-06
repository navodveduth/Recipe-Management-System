<?php
    session_start();
    if (!isset($_SESSION['userid']))
        {
            header("Location: http://localhost:8080/assignment/src/UserLoginPage.php");
            die();
        }
    if(isset($_SESSION['userid'])){
    }
            
?>

<?php 
    require_once "config/config.php";
    $checkID = $_SESSION['userid'];
?>

<?php

    if(isset($_POST['submit'])) {
        $Username = $_POST['Username'];
        $User_email = $_POST['User_email']; 
        $User_Password = $_POST['User_Password']; 
        $Check = 0;
        
        $name = mysqli_query($conn, "SELECT * FROM system_users WHERE Username = '$Username'");
        if(mysqli_num_rows($name)) {
            exit('This username already exists');
            $Check++;
        }

        $name = mysqli_query($conn, "SELECT * FROM system_users WHERE User_email = '$User_email'");
        if(mysqli_num_rows($name)) {
            exit('This email already exists');
            $Check++;
        }
        if ($Check == 0 ) {
            $sql = "UPDATE system_users SET Username='$Username', User_email='$User_email', User_Password='$User_Password'WHERE UserID='$checkID'";;

            if (mysqli_query($conn, $sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            } 
        }   

    }
?>