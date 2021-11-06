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


    <link rel="stylesheet" href="../styles/user-recipe.css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/0ba0f621bd.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Glory:wght@300&display=swap" rel="stylesheet">

    <title>My recipes</title>
</head>

<body>

    <?php require "uheader.php"?>

    <div class=grid>


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
            <div class=topic>
                Public recipes
                <hr>
            </div>


            <div class="public recipes">
                <div class="recipe-container">
                    <?php
                        $sql = "SELECT * FROM recipe WHERE UserID = '$checkID' and R_status = 'Public'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "<div class='row'>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='column'>";
                                ?>
                    <div class="box margin-bt" style="width: 300px;">
                        <div class="box" style="width: 300px;">
                            <div>
                                <p class="box-text">

                                    <a href="view-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                                        <img class = "recipe-img" src="../images/recipe/<?php echo $row['Recipe_image']?>"
                                            style="width: 300px; height: 200px">
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
                                <div class=buttons>
                                    <a class="Recipe-button"
                                        href="../recipe/edit-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                                        <button>Edit</button>
                                    </a>
                                    <a class="Recipe-button"
                                        href="user/delete-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                                        <button>Delete</button>
                                    </a>
                                </div>


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



            <div class=topic>
                Private recipes
                <hr>
            </div>


            <div class="Private recipes">
                <div class="recipe-container">
                    <?php
                        $sql = "SELECT * FROM recipe WHERE UserID = '$checkID' and R_status = 'Private'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "<div class='row'>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='column'>";
                                ?>
                    <div class="box margin-bt" style="width: 300px;">
                        <div class="box" style="width: 300px;">
                            <div>
                                <p class="box-text">

                                    <a href="view-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                                        <img class = "recipe-img" src="../images/recipe/<?php echo $row['Recipe_image']?>"
                                            style="width: 300px; height: 200px">
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
                                <div class=buttons>
                                    <a class="Recipe-button"
                                        href="../recipe/edit-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                                        <button>Edit</button>
                                    </a>
                                    <a class="Recipe-button"
                                        href="user/delete-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                                        <button>Delete</button>
                                    </a>
                                </div>


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
                            print "<h3>You have no private recipes </h3>";
                        } 
                    ?>
                </div>
            </div>
        </main>
    </div>

    <?php require "ufooter.php"?>
</body>

</html>