<?php
    session_start();
?>

<?php
    // remove all session variables
    session_unset();
    
    // destroy the session
    session_destroy();
    header("Location: http://localhost:8080/assignment/src/admin-dashboard/Adminlogin.php");

    // reference from www.w3schools.com
?>
