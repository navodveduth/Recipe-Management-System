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
    require_once "../config/config.php";

    $checkID = $_SESSION['userid'];

    /*$UserID = $_GET['UserID'];*/
    $sql = "SELECT * FROM profile_details WHERE UserID = '$checkID' ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $First_name = $row['First_name'];
            $Last_name = $row['Last_name'];
            $Bio = $row['Bio'];
            $Gender = $row['Gender'];
            $Location = $row['Location'];
            $Profile_image = $row['Profile_image'];
        }
    }

?>

<?php 
    /*$UserID = $_GET['UserID'];*/
    $sql = "SELECT * FROM system_users WHERE UserID = '$checkID'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $Username = $row['Username'];
            $User_email = $row['User_email'];
            $User_Password = $row['User_Password'];
        }
    }
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="../styles/user-dashboard.css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/0ba0f621bd.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Glory:wght@300&display=swap" rel="stylesheet">
    
    <script src="../javascript/check-personal-details.js"></script>
    <script src="../javascript/check-account-details.js"></script>
    
    <script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
    </script>

    <title>User Dashboard</title>
</head>

<body>
    <?php require "uheader.php"?>
    <div class = grid>
        
        <div class="subMenu">
                    <ul>
                        <li><a href="user-dashboard.php">Dashboard</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="my-recipes.php">My recipes</a></li>
                        <li><a href="bookmarked-recipes.php">Bookmarked recipes</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
        </div>
        <main>
            <div class = "personalDetails">
                <div class = topic>
                    Update personal details
                    <hr>
                </div>
                <form name="updateUserDetails" onsubmit="return validateUserDetails()" action="update-user-details.php" method="POST" enctype="multipart/form-data">

                    <label for="First_name"> First name </label> <br>
                    <input type="text" name="First_name" value="<?php echo $First_name; ?>" required> 
                    <br> <br> 

                    <label for="Last_name"> Last name </label> <br>
                    <input type="text" name="Last_name" value="<?php echo $Last_name; ?>" required>
                    <br> <br> 

                    <label for="Bio"> Bio </label> <br>
                    <input type="text" name="Bio" value="<?php echo $Bio; ?>"> <br> <br> 

                    <label for="Gender"> Gender </label>
                    <span class="Gender_radio">
                        <input type="radio" name="Gender" class="radio"
                            <?php if($Gender == "Male") { echo "checked"; }?> value="Male"> Male 
                        <input type="radio" name="Gender" class="radio"
                            <?php if($Gender == "Female") { echo "checked"; }?> value="Female"> Female <br> <br>
                    </span>

                    <label for="Location"> Location </label> <br>
                    <input type="text" name="Location" value="<?php echo $Location; ?>"> <br> <br> 

                    <label class="Upload_Image">Upload Profile Image</label> <br> <br>
                    <label class="image-upload" name="image">
                    <input type="file" id="image" name="image" onchange="preview()" /> <br> <br>
                    <img id="frame" class="image-pre" src="../images/profile/<?php echo $Profile_image ?>" height = "100px" />
                    </label>
                    <br>
                    <br>
                    <input id = "button" type="submit" name="submit" class="submit_button" value="Update">
                    <button id = "button" name="cancel" onclick="location.href='#'">Cancel</button>

                </form>

                <br> <br>
                <div class = "accountDetails">
                <div class = topic>
                    Update Account details
                    <hr>
                </div>
                <form name="updateAccountDetails" onsubmit = "return validateAccountDetails()" action="update-account-details.php" method="POST" enctype="multipart/form-data">

                    <label for="Username"> Username </label> <br>
                    <input type="text" name="Username" value="<?php echo $Username; ?>" required> 
                    <br> <br> 

                    <label for="User_email"> Email </label> <br>
                    <input type="text" name="User_email" value="<?php echo $User_email; ?>" required>
                    <br> <br> 

                    <label for="User_Password"> Password </label> <br>
                    <input type="password" name="User_Password" value="<?php echo $User_Password; ?>" required>
                    <br> <br> 


                    <input id = "button" type="submit" name="submit" class="submit_button" value="Update">
                    <button id = "button" name="cancel" onclick="location.href='#'">Cancel</button>

                </form>

            </div>
        
        </main>  
    </div>

    <?php require "ufooter.php"?>
</body>

</html>

