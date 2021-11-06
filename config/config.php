<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = 'recipe';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

// referance from www.w3schools.com 
?>