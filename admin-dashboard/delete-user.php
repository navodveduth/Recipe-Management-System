<?php
    session_start();
    if ((!isset($_SESSION['userid'])) and ($_SESSION['role'] = "Admin"))
        {
            header("Location: http://localhost:8080/assignment/src/admin-dashboard/Adminlogin.php");
            die();
        }
?>

<?php
  require_once "../config/config.php"
?>

<?php 

$UserID = $_GET['UserID'];
$query = "DELETE from system_users WHERE UserID='$UserID'";
$data = mysqli_query($conn, $query);
    if ($data)  {
        echo "<script> alert('Deleted successfully!!!')";
        header("location:manage-user.php");
        
    }

    else {
        echo "<script> alert('Error!!!')";

    }
?>