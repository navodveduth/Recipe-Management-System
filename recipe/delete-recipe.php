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
  require_once "../config/config.php"
?>

<?php 

$Permalink = $_GET['Permalink'];
$query = "DELETE from recipe WHERE Permalink='$Permalink'";
$data = mysqli_query($conn, $query);
    if ($data)  {
        echo "<script> alert('Deleted successfully!!!')";
        header("location:http://localhost:8080/assignment/src/recipe/recipes.php");
        
    }

    else {
        echo "<script> alert('Error!!!')";

    }
?>