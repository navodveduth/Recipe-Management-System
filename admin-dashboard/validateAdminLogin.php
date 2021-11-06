<?php
    session_start();
    if ((isset($_SESSION['userid'])) and ($_SESSION['role'] = "Admin"))
        {
            header("Location: admin-dashboard.php");
            die();
        }
?>

<?php
session_start();


require_once '../config/config.php';

if ($conn) {
    $attemptedEmail = $_POST['email'];
    $attemptedPassword = $_POST['password'];
    
    
    $sql_statement = "SELECT * FROM system_users WHERE User_email = '$attemptedEmail' AND User_Password = '$attemptedPassword' AND User_role = 'Admin'LIMIT 1";
    $result = mysqli_query($conn, $sql_statement);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            //echo "Login successful<br>";
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['Username'];
            $_SESSION['userid'] = $row['UserID'];
            $_SESSION['role'] = $row['User_role'];
            echo '<script language="javascript">'.'alert("Login Successful")'.'</script>';
            header('Location: admin-dashboard.php');
        }
        else {
            echo '<script language="javascript">'.'alert("Login Unsuccessful")'.'</script>';
            header('Location: Adminlogin.php');
           
            exit;
        }
    }
    else {
        echo "error" . mysqli_error($conn);
        exit;
    }
}
else {
    echo "Error connecting " . mysqli_connect_errno();
    exit;
}
// reference from www.github.com/shadsluiter
?>
