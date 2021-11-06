<?php 
    require "../config/config.php";
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="../styles/recipe/recipe-page.css" />
    <link rel="stylesheet" href="../styles/theme.css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/0ba0f621bd.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Glory:wght@300&display=swap" rel="stylesheet">

    <title>View All Recipes</title>
</head>

<body>

    <?php require "rheader.php"?>

    <main>

        <div class="search-container">
            <form class="search" action="user-search.php" method="POST">
                <input type="search" placeholder="Search by keyword" name="keyword" required>
                <button type="submit" name="search">SEARCH</button>
            </form>
        </div>



        <div class="recipe-top">
            <label class="recipe-lb">RECIPES</label>
            <button type="submit" title="Create Own Recipe" class="create"
                onclick="location.href='create-recipe.php'">Create Recipe</button>
        </div>

        <!-- ALL Recipes -->
        <div class="recipes">
            <div class="recipe-container">
                <?php
                $sql = "SELECT * FROM recipe";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='row'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='column'>";
                        ?>
                <div class="box margin-bt" style="width: 380px;">
                    <div>
                        <p class="box-text">

                            <a href="view-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                                <img class="recipe-img" src="../images/recipe/<?php echo $row['Recipe_image']?>"
                                    width="380px" height="300px">
                            </a>
                            <hr>

                            <a class="r-name" href="view-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                                <h4 class="box-title"><?php echo $row['Title']?></h4>
                            </a>
                            <a class="box-md r-name" href="#"><i class="fas fa-utensils"></i>
                                <?php echo $row['Category']?></a>
                        <div id="time" title="Cook_time"><i class="far fa-clock"></i>
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
    </main>
    <?php require "rfooter.php"?>
</body>

</html>