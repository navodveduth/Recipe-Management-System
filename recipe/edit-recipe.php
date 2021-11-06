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

    $Permalink = $_GET['Permalink'];
    $sql = "SELECT * FROM recipe WHERE Permalink = '$Permalink'";
    $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $RecipeID = $row['RecipeID'];
                $UserID = $row['UserID'];
                $Title = $row['Title'];
                $Category = $row['Category']; 
		        $Permalink = $row['Permalink'];
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
                $R_status = $row['R_status'];
                $Video_link = $row['Video_link'];
            }
        }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="../styles/recipe/create-recipe.css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/0ba0f621bd.js" crossorigin="anonymous"></script>

    <script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Glory:wght@300&display=swap" rel="stylesheet">

    <title>Edit Page</title>

</head>

<body>

    <?php require "rheader.php"?>

    <main>

        <ul class="breadcrumb">
            <li><a href="recipes.php">Recipes</a></li>
            <li><a href="#">Edit Recipe</a></li>
        </ul>

        <div class="recipe-top">
            <label class="recipe-lb">Recipe</label>
        </div>

        <br>
        <hr>

        <div class="form-container">
            <form action="update-recipe.php" method="POST" enctype="multipart/form-data">
                <label>Category *</label>
                <input type="text" name="category" value="<?php echo $Category; ?>" size="120" required>
                <br> <br> <br>

                <label>Title *</label>
                <input type="text" name="title" size="120" value="<?php echo $Title; ?>" required> <br> <br>
                <br>

                <label>Permalink *</label>
                <input type="text" name="p_link" value="<?php echo $Permalink; ?>" size="120" required> <br>
                <br>
                <br>

                <label>Description *<label>
                        <textarea name="description" rows="5" cols="98"><?php echo $R_description; ?></textarea>
                        <br>
                        <br> <br> <br>

                        <label class="pre_time_lb">Preparation Time</label> <br> <br>
                        <input type="text" class="pre_time_text" name="prepare_time" value="<?php echo $Prep_time; ?>"
                            placeholder="10 min">

                        <label class="cook_time_lb">Cooking Time</label>
                        <input type="text" class="cook_time_text" name="cook_time" value="<?php echo $Cook_time; ?>"
                            placeholder="30 min"> <br> <br>

                        <label class="ingre_lb">Ingredients *</label>
                        <textarea class="ingre_text" name="ingredients" rows="20"
                            cols="40"><?php echo $Ingredients; ?></textarea>

                        <label class="diff_lb">Difficulty *</label>
                        <select class="diff" name="difficulty">
                            <option value="Easy" <?php if($Difficulty=="Easy") echo 'selected="selected"'; ?>>
                                Easy </option>
                            <option value="Medium" <?php if($Difficulty=="Medium") echo 'selected="selected"'; ?>>
                                Medium
                            </option>
                            <option value="Hard" <?php if($Difficulty=="Hard") echo 'selected="selected"'; ?>>
                                Hard </option>
                        </select>

                        <label class="serve_lb">Serves *</label>
                        <input type="text" class="serves_text" name="serves" value="<?php echo $No_of_servings; ?>"
                            size="15">
                        <br>
                        <br>

                        <label class="create_lb">Created *</label>
                        <input type="text" class="create_text" name="created" value="<?php echo $Created_timestamp; ?>"
                            readonly> <br>
                        <br>

                        <label class="update_lb">Updated *</label>
                        <input type="datetime-local" class="update_text" name="updated"
                            value="<?php echo date('Y-m-d');?>" required>
                        <br>
                        <br>

                        <label class="upload_lb">Upload Image *</label>
                        <label class="image-upload" name="image">
                            <input type="file" id="image" name="image" onchange="preview()" /> <br> <br>
                            <img id="frame" class="image-pre" src="../images/recipe/<?php echo $Recipe_image ?>"
                                width="200px" height="200px" />
                        </label>


                        <label class="method_lb">Method *</label>
                        <textarea class="method_text" name="method" value="<?php echo $Instructions; ?>" rows="10"
                            cols="98"><?php echo $Instructions ?></textarea>

                        <label class="status_lb">Status *</label>
                        <span class="status_rd">
                            <input type="radio" name="status" class="rd_btn"
                                <?php if($R_status == "Public") { echo "checked"; }?> value="Public"> Public
                            <br><br>
                            <input type="radio" name="status" class="rd_btn"
                                <?php if($R_status == "Private") { echo "checked"; }?> value="Private"> Private
                            <br> <br>
                        </span>


                        <label class="vid_lb">Video Link</label>
                        <input type="text" class="vid_text" name="video" value="<?php echo $Video_link; ?>" size="50">
                        <br>
                        <br>

                        <input type="submit" name="submit" class="submit-btn" value="Update">
                        <button name="cancel" onclick="location.href='manage-recipe.php'">Cancel</button>
            </form>

            <div style="padding-bottom: 80%;"></div>
        </div>
    </main>
    <?php require "rfooter.php"?>
</body>

</html>