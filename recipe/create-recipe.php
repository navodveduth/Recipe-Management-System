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
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="../styles/recipe/create-recipe.css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/0ba0f621bd.js" crossorigin="anonymous"></script>

    <script>
    /* reference from https://stackoverflow.com/a/62167551 */
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Glory:wght@300&display=swap" rel="stylesheet">

    <title>Create Recipe</title>

</head>

<body>

    <?php require "rheader.php"?>

    <main>

        <ul class="breadcrumb">
            <li><a href="recipes.php">Recipes</a></li>
            <li><a href="create-recipe.php">Create Recipe</a></li>
        </ul>

        <div class="recipe-top">
            <label class="recipe-lb">Recipe</label>
        </div>

        <br>
        <hr>


        <div class="form-container">
            <form action="save-recipe.php" method="POST" enctype="multipart/form-data">
                <label>Category *</label>
                <input type="text" name="category" placeholder="Cake / Pasta / Dessert / Salad" size="120" required>
                <br> <br> <br>

                <label>Title *</label>
                <input type="text" name="title" size="120" required> <br> <br> <br>

                <label>Permalink *</label>
                <input type="text" name="permalink" size="120" required> <br> <br> <br>

                <label>Description *</label>
                <textarea name="description" rows="5" cols="98" required></textarea> <br> <br> <br> <br>

                <label class="pre_time_lb">Preparation Time</label> <br> <br>
                <input type="text" class="pre_time_text" name="prepare_time" placeholder="10 min">

                <label class="cook_time_lb">Cooking Time</label>
                <input type="text" class="cook_time_text" name="cook_time" placeholder="30 min"> <br> <br>

                <label class=" ingre_lb">Ingredients *</label>
                <textarea class="ingre_text" name="ingredients" rows="20" cols="40" required></textarea>

                <label class="diff_lb">Difficulty *</label>
                <select class="diff" name="difficulty">
                    <option value="Easy"> Easy </option>
                    <option value="Medium"> Medium </option>
                    <option value="Hard"> Hard </option>
                </select>

                <label class="serve_lb">Serves *</label>
                <input type="text" class="serves_text" name="serves" size="15" required> <br> <br>

                <label class="create_lb">Created *</label>
                <input type="text" class="create_text" name="created" value='<?php echo date('Y-m-d h:m:s');?>'
                    readonly>
                <br>
                <br>

                <label class="update_lb">Updated *</label>
                <input type="datetime-local" class="update_text" name="updated" required> <br> <br>

                <label class="upload_lb">Upload Image *</label>
                <label class="image-upload" name="image">
                    <input type="file" id="image" name="image" onchange="preview()" /> <br> <br>
                    <img id="frame" class="image-pre" src="../images/image-upload.png" width="200px" height="200px" />
                </label>


                <label class="method_lb">Method *</label>
                <textarea class="method_text" name="method" rows="10" cols="98" required></textarea>

                <label class="status_lb">Status *</label>
                <span class="status_rd">
                    <input type="radio" name="status" class="rd_btn" value="Public" checked required> Public <br><br>
                    <input type="radio" name="status" class="rd_btn" value="Private"> Private <br> <br>
                </span>


                <label class="vid_lb">Video Link</label>
                <input type="text" class="vid_text" name="video" size="50"> <br> <br>

                <input type="submit" name="submit" class="submit-btn" value="Save">
                <button type="reset" name="cancel" onclick="location.href='#'">Cancel</button>
            </form>

            <div style="padding-bottom: 80%;"></div>
        </div>
    </main>

    <?php require "rfooter.php"?>
</body>

</html>