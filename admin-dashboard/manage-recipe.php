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

    <title>Manage Recipes</title>


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
            <label class="mglbl"> Manage Recipes <i class="fas fa-clipboard-list" style="font-size: 35px;"></i></label>
            <br><br><br>
            <table border="1" width="100%">
                <tr>
                    <th id="thead">Recipe Name</th>
                    <th id="thead">Created</th>
                    <th id="thead">Category</th>
                    <th id="thead">Serves</th>
                    <th id="thead">Status</th>
                    <th id="thead">Operations</th>

                </tr>
                <?php 
                  $sql = "SELECT * FROM recipe";
                  $result = $conn->query($sql);
        
                  if($result->num_rows > 0) {
                    while($row=$result->fetch_assoc()) {
                        $Permalink = $row['Permalink'];
                      echo 
                      "<tr><td>".$row["Title"].
                      "</td><td>".$row["Created_timestamp"].
                      "</td><td>".$row["Category"].
                      "</td><td>".$row["No_of_servings"].
                      "</td><td>".$row["R_status"].
                      "</td><td><a href='../recipe/edit-recipe.php?Permalink=$Permalink'><input type='submit' id='mg-btn' value='Edit'></a>
                      <a href='../recipe/delete-recipe.php?Permalink=$Permalink'><input type='submit' id='mg-btn' value='Delete'></a>
                      </td></tr>";
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