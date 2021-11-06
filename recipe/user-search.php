<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="../styles/recipe/recipe-page.css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/0ba0f621bd.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Glory:wght@300&display=swap" rel="stylesheet">


    <Title>Search Result</Title>

    <style>
    /* Browse recipe label */
    #browse-re {
        font-family: "Ubuntu";
        font-size: 2rem;
        padding: 1.5rem 0 0 3.5rem;
        background-color: #f9f9f9;
        display: flex;
    }

    #search-lb {
        font-family: "Ubuntu";
        font-size: 1.5rem;
        font-weight: 200;
        padding: 1.8rem 0 0 4.5rem;
    }
    </style>

</head>

<body>

    <?php
    require "../config/config.php";
    require "rheader.php";
    ?>

    <label id="browse-re">Browse Recipes</label>

    <div class="search-container" style="padding: 4% 10%;">
        <form class="search" action="user-search.php" method="POST">
            <input type="search" placeholder="Search by keyword" name="keyword" required>
            <button type="submit" name="search">SEARCH</button>
        </form>
    </div>


    <!-- Search Result -->
    <div class="recipes">
        <div class="recipe-container">

            <?php
                if (isset($_POST['search'])){
                    $keyword = mysqli_real_escape_string($conn, $_POST['keyword']);

                    echo "<div class='recipe-top'>
                    
                        <label id='search-lb'>
                        SEARCH RESULT FOR : "; 
    
                        echo $keyword;
                        
                    echo "</label></div><br>"; 

                    $sql = "SELECT * FROM recipe WHERE 
                                       Title LIKE '%$keyword%' 
                                    OR Category LIKE '%$keyword%'
                                    OR R_description LIKE '%$keyword%'
                                    OR Difficulty LIKE '%$keyword%' 
                                    OR Prep_time LIKE '%$keyword%' 
                                    OR Cook_time LIKE '%$keyword%' 
                                    OR Ingredients LIKE '%$keyword%' 
                                    OR Instructions LIKE '%$keyword%'";
                    $result = mysqli_query($conn, $sql);
                    $queryResult = mysqli_num_rows($result);

                    if($queryResult > 0) {
                        echo "<div class='row'>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='column'>";
            ?>

            <div class="box margin-bt" style="width: 380px;">
                <div class="box" style="width: 380px;">
                    <div>
                        <p class="box-text">
                            <a href="view-recipe.php?Permalink=<?php echo $row['Permalink']?>">
                                <img class="recipe-img" src="../images/recipe/<?php echo $row['Recipe_image']?>"
                                    width="380px" height="300px"></a>
                            <hr>
                            <a class="r-name" href="view-recipe.php?RecipeID=<?php echo $row['RecipeID']?>">
                                <h4 class="box-title"><?php echo $row['Title']?></h4>
                            </a>
                            <a class="box-md r-name" href="#"><i class="fas fa-utensils"></i>
                                <?php echo $row['Category']?></a>
                        <div id="time" Title="Cooking Time"><i class="far fa-clock"></i>
                            <?php echo $row['Cook_time']?></div>
                        </p>
                    </div>
                </div>
            </div>

            <?php
                        echo "</div>";
                    }
                    echo "</div>";
                }
            }
            else {
                echo 
                    "<div class='recipe-top'>
                        <label class='recipe-lb' style='font-size: 1.5rem; font-weight: 200;'>
                            SEARCH RESULT FOR :  No results found.
                        </label>
                    </div>";
            }
            ?>

        </div>
    </div>
    <?php require "rfooter.php"; ?>
</body>

</html>