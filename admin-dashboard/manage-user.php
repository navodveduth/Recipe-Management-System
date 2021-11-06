<?php
    session_start();
    if ((!isset($_SESSION['userid'])) and ($_SESSION['role'] = "Admin"))
        {
            header("Location: http://localhost:8080/assignment/src/admin-dashboard/Adminlogin.php");
            die();
        }
?>

<?php

  require_once "../config/config.php";
  
  /*$UserID = $_GET['UserID'];
  $sql = "SELECT * FROM profile_details WHERE UserID = '$UserID'";
  $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
              $fname = $row['First_name '];
              $profile_img = $row['Profile_image '];
          }
    }*/
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="../styles/admin/manage-page.css" />

    <script src="https://kit.fontawesome.com/0ba0f621bd.js" crossorigin="anonymous"></script>

    <title>Manage Users</title>


</head>

<body>
    <?php require "aheader.php" ?>
    <div class="db-grid">
        <div>
            <ul class="mr-navBar">
                <li id="li-list"><a href="admin-dashboard.php">Dashboard</a></li>
                <li id="li-list"><a href="manage-user.php">Users</a></li>
                <li id="li-list"><a href="manage-recipe.php">Recipe</a></li>
                <li id="li-list"><a href="logoutAdmin.php">Log Out</a></li>
            </ul>
        </div>

        <div>
            <br><br>
            <label class="mglbl"> Admin Users <i class="fas fa-user-shield"
                    style="font-size: 35px; padding-left:8px;"></i></label>
            <br><br><br>
            <table border="1" width="100%">
                <tr>
                    <th id="thead">Username</th>
                    <th id="thead">Group</th>
                    <th id="thead">Operations</th>

                </tr>
                <?php 
                  $sql = "SELECT * FROM system_users";
                  $result = $conn->query($sql);
        
                  if($result->num_rows > 0) {
                    while($row=$result->fetch_assoc()) {
                        $UserID  = $row['UserID'];
                        $User_role = $row['User_role'];
                        
                        if ($User_role == "Admin") {
                      echo 
                      "<tr><td>".$row["Username"].
                      "</td><td>".$row["User_role"].
                      "</td><td><a href='edit-user.php?UserID=$UserID'><input type='submit' id='mg-btn' value='Edit'></a>
                      <a href='delete-user.php?UserID=$UserID'><input type='submit' id='mg-btn' value='Delete'></a>
                      </td></tr>";
                    }
                    }
                  }
                  else {
                    echo "0 results";
                  }
              
                  echo "</table>";
                ?>


                <br><br>
                <label class="mglbl"> Normal Users <i class="fas fa-user"
                        style="font-size: 35px; padding-left:8px;"></i></label>
                <br><br><br>
                <table border="1" width="100%">
                    <tr>
                        <th id="thead">Username</th>
                        <th id="thead">Group</th>
                        <th id="thead">Operations</th>

                    </tr>
                    <?php 
                  $sql = "SELECT * FROM system_users";
                  $result = $conn->query($sql);
        
                  if($result->num_rows > 0) {
                    while($row=$result->fetch_assoc()) {
                        $UserID  = $row['UserID'];
                        $User_role = $row['User_role'];
                        
                        if ($User_role == "Normal") {
                      echo 
                      "<tr><td>".$row["Username"].
                      "</td><td>".$row["User_role"].
                      "</td><td><a href='edit-user.php?UserID=$UserID'><input type='submit' id='mg-btn' value='Edit'></a>
                      <a href='delete-user.php?UserID=$UserID'><input type='submit' id='mg-btn' value='Delete'></a>
                      </td></tr>";
                    }
                    }
                  }
                  else {
                    echo "0 results";
                  }
              
                  echo "</table>";
              
                  $conn->close();
                ?>
        </div>

    </div>
    <br><br>
    <?php require "admin-footer.php" ?>
</body>

</html>