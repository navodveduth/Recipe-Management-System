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

    $UserID = $_SESSION['userid'];
    
    $permalink = $_GET['Permalink'];
    $sql = "SELECT * FROM recipe WHERE Permalink = '$permalink'";
    $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $RecipeID = $row['RecipeID'];
                $Title = $row['Title'];
                $Category = $row['Category']; 
		        $permalink = $row['Permalink'];
                $R_description = $row['R_description'];
                $Prep_time = $row['Prep_time'];
                $Cook_time = $row['Cook_time'];
                $Ingredients = $row['Ingredients'];
                $Difficulty = $row['Difficulty'];
                $No_of_servings = $row['No_of_servings'];
                $Created_timestamp = $row['Created_timestamp'];
                $Updated_timestamp = $row['Updated_timestamp'];
                $Recipe_image = $row['Recipe_image'];
                $Instructions = $row['Instructions'];
                $Video_link = $row['Video_link'];
            }
        }

        /* Average Rating */ 
        $rate = "SELECT AVG(rating) FROM Rate WHERE RecipeID = $RecipeID GROUP BY RecipeID";
        $rate_result = mysqli_query($conn, $rate);
        
        if(mysqli_num_rows($rate_result) > 0){
            while($row = mysqli_fetch_array($rate_result)){
                $avg_rate =  ROUND($row['AVG(rating)'], 2);
            }
        }
        else
            $avg_rate = 0;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="../styles/recipe/view-recipe.css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/0ba0f621bd.js" crossorigin="anonymous"></script>


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">

    <Title><?php echo $Title ?></Title>

</head>

<body>

    <div class="noPrint">
        <?php require "rheader.php"?>
    </div>

    <main>

        <div class="recipe-bar">
            <label class="recipe-lb"><?php echo $Title ?></label>
        </div>
        <div class="recipe-cat">
            <span><i class="fas fa-utensils"></i><?php echo $Category ?></span>
            <span><i class="far fa-calendar-alt"></i>Created: <?php echo $Created_timestamp ?></span>
            <span><i class="far fa-clock"></i>Last Update: <?php echo $Updated_timestamp ?></span>
            <span><i class="far fa-star"></i>Rating: <?php echo $avg_rate ?></span>

            <form class="search noPrint" action="user-search.php" method="POST">
                <input type="search" placeholder="🔍 Search by keyword" name="keyword" required>
                <button type="submit" name="search" style="display: none;"></button>
            </form>
        </div>

        <div class='recipe-grid'>
            <div class="left-side">
                <div class="recipe-img">
                    <img src="../images/recipe/<?php echo $Recipe_image ?>" width="100%" height="480px">
                    <div class="recipe-dt noPrint">
                        <ul class="list-dt">
                            <li>Serves: <?php echo $No_of_servings?></li>
                            <li>Prepare Time: <?php echo $Prep_time ?></li>
                            <li>Cooking Time: <?php echo $Cook_time ?></li>
                            <li>Difficulty: <?php echo $Difficulty ?></li>
                        </ul>
                    </div>
                    <div class="recipe-des">
                        <p><?php echo $R_description ?></p>
                    </div>
                    <div class="recipe-video noPrint">
                        <iframe width="680px" height="400px" src=<?php echo $Video_link ?>></iframe>
                    </div>
                    <div>
                        <fieldset class="field-set" style="margin-top:25px;">
                            <legend style="font-size:17px; font-weight: bold;">Ingredients</legend>
                            <form method="POST" action="">
                                <input type="submit" id="bookmark-btn" name="bookmark" class="submit-btn noPrint"
                                    value="Bookmark">

                                <input type="submit" id="print-btn" name="print" class="submit-btn noPrint"
                                    value="Print" onclick="window.print()">
                            </form>

                            <?php 
                                if(isset($_POST['bookmark'])) {
                                    $b_query = "INSERT INTO Bookmark (UserID, RecipeID) VALUES ('$UserID', '$RecipeID')";
                                    
                                    /* Bookmark alert */
                                    if(mysqli_query($conn, $b_query)) {
                                        echo "<script> alert('Bookmark added Successfully!') </script>";
                                    }
                                    else { 
                                        echo "<script> alert('Error: Bookmark not added') </script>";
                                    }
                                }
                            ?>

                            <div>
                                <ul class="Ingredients">
                                    <?php foreach (explode("\n", $Ingredients) as $i): ?>
                                    <li>
                                        <?php echo $i ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </fieldset>
                    </div>
                    <div>
                        <fieldset class="field-set" style="margin-top:25px;">
                            <legend style="font-size:17px; font-weight: bold;">Instructions</legend>
                            <div>
                                <ol class="Instructions">
                                    <?php foreach (explode("\n", $Instructions) as $i): ?>
                                    <li>
                                        <?php echo $i ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                        </fieldset>
                    </div>
                    <div>
                        <fieldset class="field-set noPrint" style="margin-top:50px;">
                            <legend align="center" style="font-size:17px; font-weight: bold;">COMMENTS</legend>
                            <label class="rate-lb">Rate This Recipe</label><br>

                            <!-- reference from https://www.markuptag.com/feedback-form-with-star-rating-html -->
                            <form method="POST" action="">
                                <div class="star-rating star-input">
                                    <input type="radio" name="rating" id="rating-5" value="5">
                                    <label for="rating-5" class="fas fa-star"></label>
                                    <input type="radio" name="rating" id="rating-4" value="4">
                                    <label for="rating-4" class="fas fa-star"></label>
                                    <input type="radio" name="rating" id="rating-3" value="3">
                                    <label for="rating-3" class="fas fa-star"></label>
                                    <input type="radio" name="rating" id="rating-2" value="2">
                                    <label for="rating-2" class="fas fa-star"></label>
                                    <input type="radio" name="rating" id="rating-1" value="1">
                                    <label for="rating-1" class="fas fa-star"></label>
                                </div>
                                <div class="comment-mid">
                                    <label class="com-lb">Add Your Comment</label><br>
                                    <textarea placeholder="Comment" name="comment" class="com-area" rows="6" cols="50"
                                        required></textarea>
                                    <input type="submit" class="submit-btn" name="submit" value="Submit">
                                    <br /><br />

                                </div>
                            </form>

                            <?php 
                                if(isset($_POST['submit'])) {
                                    $comment = $_POST["comment"];
                                    $rating = $_POST["rating"];
                                    $c_time = date('Y-m-d h m s');
                                    
                                    $c_query = "INSERT INTO Comment (UserID, RecipeID, Comment_desc, Comment_timestamp) VALUES ('$UserID', '$RecipeID', '$comment', '$c_time')";
                                    $r_query = "INSERT INTO Rate (UserID, RecipeID, Rating) VALUES ('$UserID', '$RecipeID', '$rating')";
                                  
                                    /* Comment alert */
                                    if(mysqli_query($conn, $c_query)) {
                                        echo "<script> alert('Comment added Successfully!') </script>";
                                    }
                                    else { 
                                        echo "<script> alert('Error: Comment not added') </script>";
                                    }

                                    /* Rating alert */
                                    if(mysqli_query($conn, $r_query)) {
                                        echo "<script> alert('Rate added Successfully!') </script>";
                                    }
                                    else { 
                                        echo "<script> alert('Error: Rating not added') </script>";
                                    }
                                }
                                ?>
                        </fieldset>
                        <fieldset class="field-set noPrint" style="margin-top: 0; margin-bottom:50px;">
                            <div>
                                <?php
                                    $sql = "SELECT * FROM comment C, profile_details P WHERE C.UserID =  P.UserID AND C.RecipeID = $RecipeID;";
                                    $u_result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($u_result) > 0) {
                                        while ($row = mysqli_fetch_assoc($u_result)) {
                                ?>
                                <img class="cc-img" src="../images/profile/<?php echo $row['Profile_image'] ?>">
                                <span class="fname"><?php echo $row['First_name'] ?></span>
                                <br />
                                <span class="c_des"><?php echo $row['Comment_desc'] ?></span>
                                <br /><br />

                                <?php 
                                    }
                                }
                                ?>
                            </div>

                        </fieldset>
                    </div>
                </div>
            </div>

            <div class="right-side ">
                <div class="author noPrint">
                    <fieldset class="field-set">
                        <legend style="font-size:17px; font-weight: bold;">AUTHOR</legend>

                        <?php
                            $sql = "SELECT * FROM profile_details WHERE UserID = '$UserID'"; 
                            $u_result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($u_result) > 0) {
                                while ($row = mysqli_fetch_assoc($u_result)) {
                        ?>

                        <img class="user-img" src="../images/profile/<?php echo $row['Profile_image'] ?>">

                        <?php echo $row['First_name'] ?>
                        <br /><br />

                        <?php echo $row['Bio'] ?>
                        <br /><br>

                    </fieldset>
                </div>
                <div class="popular">
                    <fieldset class="field-set">
                        <legend style="font-family:'Ubuntu'; font-size:17px; font-weight: bold;">POPULAR RECIPES
                        </legend>

                        <?php
                            $sql = "SELECT * FROM rate T, recipe R WHERE R.RecipeID = T.RecipeID GROUP BY T.RecipeID ORDER by AVG(T.Rating) DESC LIMIT 6";
                            $p_result = mysqli_query($conn, $sql);
                                            
                            if (mysqli_num_rows($p_result) > 0) {
                                while ($row = mysqli_fetch_assoc($p_result)) { ?>
                        <div class="popular-grid">
                            <div class="popu-top">
                                <img class="popu-img" src="../images/recipe/<?php echo $row['Recipe_image'] ?>">
                                <div class="popu-bt">
                                    <?php echo $row['Title'] ?> <br><br>
                                    <a class="popu-link"
                                        href="view-recipe.php?Permalink=<?php echo $row['Permalink']?>">View Recipe</a>
                                </div>
                            </div>
                        </div>
                        <?php 
                        }
                      } 
                    ?>
                        <?php 
                        }
                     } 
                    ?>

                    </fieldset>
                </div>
                <div class="share noPrint">
                    <fieldset class="field-set" style="border-radius: 15px;">
                        <legend style="font-size:17px; font-weight: bold;">SHARE</legend>
                        <a href="http://api.whatsapp.com/send?text=http://localhost:8080/web/user/view-recipe.php?Permalink=<?php echo $row['Permalink']?>"
                            target="_blank">
                            <img class="share-img" src="../icons/whatsapp.png"></a>
                        <a href="http://www.facebook.com/sharer.php?u=http://localhost:8080/web/user/view-recipe.php?Permalink=<?php echo $row['Permalink']?>"
                            target="_blank">
                            <img class="share-img" src="../icons/facebook.png"></a>
                        <a href="http://www.instagram.com/sharer.php?u=http://localhost:8080/web/user/view-recipe.php?Permalink=<?php echo $row['Permalink']?>"
                            target="_blank">
                            <img class="share-img" src="../icons/instagram.png"></a>
                    </fieldset>
                </div>
            </div>
        </div>
        </div>
    </main>
    <div class="noPrint">
        <?php require "rfooter.php"?>
    </div>
</body>

</html>