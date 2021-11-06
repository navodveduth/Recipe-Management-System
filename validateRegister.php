<?php
session_start();

require_once 'config/config.php';

if ($conn) {
    $attemptedLoginName = $_POST['Username'];
    $attemptedEmail = $_POST['email'];
    $attemptedPassword = $_POST['password'];
    $attemptedPasswordCheck = $_POST['passwordCheck'];
    
    if ($attemptedPassword == $attemptedPasswordCheck) {
        $sql_statement = "SELECT * FROM system_users WHERE Username = '$attemptedLoginName' OR User_email = '$attemptedEmail' LIMIT 1";
        $result = mysqli_query($conn, $sql_statement);
        if ($result) {
            if (mysqli_num_rows($result) == 0) {
                $sql = "INSERT INTO system_users (Username, User_email, User_Password)
                VALUES ('$attemptedLoginName', '$attemptedEmail', '$attemptedPassword')";

                if (mysqli_query($conn, $sql)) {
                    echo '<script language="javascript">'.'alert("New account created successfully")'.'</script>';
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                header('Location: UserLoginPage.php');
            }  
            else {
                echo '<script language="javascript">'.'alert("Email or Username already in use")'.'</script>';
                exit;
            }
        }
        else {
            echo "error" . mysqli_error($conn);
            exit;
        }
    }
    else {
        echo '<script language="javascript">'.'alert("Passwords does not match")'.'</script>';
        exit;
    }
    
}
else {
    echo "Error connecting " . mysqli_connect_errno();
    exit;
}
// reference from www.github.com/shadsluiter and www.w3schools.com
?>