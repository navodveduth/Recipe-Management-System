<?php
  require "../config/config.php"
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