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
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="../styles/profile.css" />
    <link rel="stylesheet" href="../styles/user-recipe.css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/0ba0f621bd.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Glory:wght@300&display=swap" rel="stylesheet">

    <title>User Profile</title>
</head>

<body>

    <?php require "uheader.php"?>

 
        <?php
        $sql = "SELECT First_name, Last_name, Gender, Location, Bio, Profile_image FROM `profile_details` WHERE UserID = '$checkID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $First_name = $row['First_name'];
            $Last_name = $row['Last_name'];
            $Bio = $row['Bio'];
            $Gender = $row['Gender'];
            $Location = $row['Location'];
            $Profile_image = $row['Profile_image'];
        }
        } else {
            echo "0 results";
        }
        ?>
        <div class = "grid">

            <div id = "profile_image">
                <img src="../images/profile/<?php echo "$Profile_image"?>" alt="profile image" height="300px">
            </div>

            <div id = profile_details>

                <div id = "First_name">
                    <i class="fas fa-user"></i>
                    <?php echo "$First_name"?>
                    <?php echo "$Last_name"?>
                </div>
                
                <div id = "Gender">
                    <i class="fas fa-venus-mars"></i>
                    <?php echo "$Gender"?>
                </div>

                <div id = "Location">
                    <i class = "fas fa-map-marker-alt"></i>
                    <i class = "fas fa-location"></i> <?php echo "$Location"?>
                </div>

                <div id = "Bio">
                    <i class="fas fa-address-card"></i>
                    <?php echo "$Bio"?>
                </div>

            </div>

            <br><br>

            <div class="userRecipe">

            <div class = topic>
                Published recipes
                <hr>
            </div>
                    <div class="recipe-container">
                        <?php
                        $sql = "SELECT * FROM recipe WHERE UserID = '$checkID' and R_status = 'Public'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "<div class='row'>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='column'>";
                                ?>
                            <div class="box margin-bt" style="width: 380px;">
                                <div class="box" style="width: 380px;">
                                    <div>
                                        <p class="box-text">

                                            <a href="view-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                                                <img class="recipe-img" src="../images/recipe/<?php echo $row['Recipe_image']?>" style="width: 380px; height: 300px">
                                            </a>
                                            <hr>

                                            <a class="r-name" href="view-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                                                <h4 class="box-title"><?php echo $row['Title']?></h4>
                                            </a>
                                            <a class="box-md r-name" href="#">
                                                <i class="fas fa-utensils"></i>
                                                <?php echo $row['Category']?>
                                            </a>
                                            <div id="time" title="Cook_time">
                                                <i class="far fa-clock"></i>
                                                <?php echo $row['Cook_time']?>
                                            </div>
                                            <br>
                                            

                                        </p>
                                    </div>
                                </div>
                            </div>
                        
                        <?php
                                echo "</div>";
                            }
                            echo "</div>";
                        }
                        else {
                            print "<h3>You have no Public recipes </h3>";
                        }  
                    ?>
                    </div>
                </div>
        </div>
        

    <?php require "ufooter.php"?>
</body>

</html>

