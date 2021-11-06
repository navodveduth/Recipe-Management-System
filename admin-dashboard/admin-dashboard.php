<?php
    session_start();
    if ((!isset($_SESSION['userid'])) && ($_SESSION['role'] != "Admin"))
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


    $normal_result = mysqli_query($conn,"SELECT count(*) as Nuser from system_users WHERE User_role = 'Normal'");
    $normal = mysqli_fetch_assoc($normal_result);

    $admin_result = mysqli_query($conn,"SELECT count(*) as Auser from system_users WHERE User_role = 'Admin'");
    $admin = mysqli_fetch_assoc($admin_result);

    $recipe_result = mysqli_query($conn,"SELECT count(*) as recipe from recipe");
    $recipes = mysqli_fetch_assoc($recipe_result);
      

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="../styles/admin/manage-page.css" />

    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/0ba0f621bd.js" crossorigin="anonymous"></script>

    <title>Admin Dashboard</title>


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


        <div class="d-container">
            <div class='row'>
                <div class="fd-container">
                    <fieldset class="fdset">
                        <legend>Administrators</legend>
                        <i class="fas fa-user-shield" id="font-icon" style="font-size: 35px; padding: 1rem;">
                            <div class="view-box"> Total Admins </div>
                        </i>
                        <label>
                            <?php echo $admin['Auser'] ?>
                        </label>
                    </fieldset>
                </div>

                <div class="fd-container">
                    <fieldset class="fdset">
                        <legend>Recipes</legend>
                        <i class="fas fa-scroll" id="font-icon" style="font-size: 35px; padding: 1rem;">
                            <div class="view-box">Total Recipes </div>
                        </i>
                        <label>
                            <?php echo $recipes['recipe'] ?>
                        </label>
                    </fieldset>
                </div>
            </div>
            <div class='row'>
                <div class="fd-container">
                    <fieldset class="fdset">
                        <legend>Normal Users</legend>
                        <i class="fas fa-user" id="font-icon" style="font-size: 35px; padding: 1rem;">
                            <div class="view-box">Total Normal Users </div>
                        </i>
                        <label>
                            <?php echo $normal['Nuser'] ?>
                        </label>
                    </fieldset>
                </div>

                <div class="fd-container">
                    <fieldset class="fdset">
                        <legend>Newsletters</legend>
                        <i class="far fa-envelope-open" id="font-icon" style="font-size: 35px; padding: 1rem;">
                            <div class="view-box">Total Newsletters</div>
                        </i>
                        <label>
                            <?php echo 20 ?>
                        </label>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <div class="d-container" style="margin-left: 7rem;">
        <div class='row'>
            <div class="fd-container">
                <fieldset class="fdset">
                    <legend>Visits</legend>
                    <i class="far fa-eye" id="font-icon" style="font-size: 35px; padding: 1rem;">
                        <div class="view-box">Total Visits </div>
                    </i>
                    <label>
                        <?php echo 10 ?>
                    </label>
                </fieldset>
            </div>
        </div>
    </div>



    </div>
    <?php require "admin-footer.php" ?>
</body>

</html>