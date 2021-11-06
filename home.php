<?php 
    require "config/config.php";
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/main.css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/0ba0f621bd.js" crossorigin="anonymous"></script>


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Glory:wght@300&display=swap" rel="stylesheet">

    <title>Home</title>


</head>

<body>

    <?php require "header.php" ?>
    <div class="home-top">
        <label class="home-lb">TRENDING RECIPES</label>
    </div>

    <div class="slider-container">
        <i class="fas fa-arrow-circle-left" id="preBtn"></i>
        <i class="fas fa-arrow-circle-right" id="nxtBtn"></i>
        <div class="slider">
            <div class="recipes">
                <div class="recipe-container">
                    <?php
                $sql = "SELECT * FROM rate T, recipe R WHERE R.RecipeID = T.RecipeID GROUP BY T.RecipeID ORDER by AVG(T.Rating) DESC LIMIT 7";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='row'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='column'>";
                        ?>
                    <div class="box" style="width: 340px;">
                        <div>
                            <p class="box-text">
                                <a href="recipe/view-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                                    <img class="recipe-img" src="images/recipe/<?php echo $row['Recipe_image']?>"
                                        width="340px" height="280px">
                                </a>
                                <hr>

                                <a class="r-name"
                                    href="recipe/view-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                                    <h4 class="box-title">
                                        <?php echo $row['Title']?>
                                    </h4>
                                </a>
                                <a class="box-md r-name" href="#">
                                    <i class="fas fa-utensils"></i>
                                    <?php echo $row['Category']?>
                                </a>
                            <div id="time" title="Cook_time">
                                <i class="far fa-clock"></i>
                                <?php echo $row['Cook_time']?>
                            </div>
                            </p>
                        </div>

                    </div>
                    <?php
                        echo "</div>";
                    }
                    echo "</div>";
                }
            ?>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="md-recipe-top">
        <label class="md-recipe-lb">Latest Recipes</label>
    </div>
    <div class="md-recipes">
        <div class="md-recipe-container">
            <?php
                $sql = "SELECT * FROM recipe";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='md-row'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='md-column'>";
                        ?>
            <div class="md-box md-margin-bt" style="width: 380px;">
                <div>
                    <p class="md-box-text">

                        <a href="recipe/view-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                            <img class="md-recipe-img" src="images/recipe/<?php echo $row['Recipe_image']?>"
                                width="380px" height="300px">
                        </a>
                        <hr>

                        <a class="md-r-name" href="recipe/view-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                            <h4 class="md-box-title"><?php echo $row['Title']?></h4>
                        </a>
                        <a class="md-box-md md-r-name" href="#"><i class="fas fa-utensils"></i>
                            <?php echo $row['Category']?></a>
                    <div id="md-time" title="Cook_time"><i class="far fa-clock"></i>
                        <?php echo $row['Cook_time']?></div>
                    </p>
                </div>
            </div>
            <?php
                        echo "</div>";
                    }
                    echo "</div>";
                }
            ?>
        </div>
    </div>

    <script src="javascript/main.js"></script>

    <?php require "footer.php" ?>
</body>

</html>