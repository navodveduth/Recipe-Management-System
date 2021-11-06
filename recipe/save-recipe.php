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

<?php 
    $category = $_POST["category"];
    $title = $_POST["title"];
    $permalink = $_POST["permalink"];
    $description = $_POST["description"];
    $prep_time = $_POST["prepare_time"];
    $cook_time = $_POST["cook_time"];
    $ingred = $_POST["ingredients"];
    $diff = $_POST["difficulty"];
    $serves = $_POST["serves"];
    $created = $_POST["created"];
    $updated = $_POST["updated"];
    $method = $_POST["method"];
    $status = $_POST["status"];
    $video = $_POST["video"];

    $img_dir = "../images/recipe/";    // reference from lecture slide
    $image_file = $img_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $image_file);
    $img_name = basename($_FILES["image"]["name"]);
    
    $ck_query = mysqli_query($conn, "SELECT * FROM recipe WHERE permalink='$permalink'");

    if(mysqli_num_rows($ck_query ) != 0)
    {
        echo "<script> alert('Permalink already exist!!!') </script>";
    }
    else 
    {
        $query = "INSERT INTO Recipe (Category, UserID, Title, Permalink, R_description, Prep_time, Cook_time, Ingredients, Difficulty, No_of_servings, Created_timestamp, Updated_timestamp, Recipe_image, Instructions, R_status, Video_link) VALUES ('$category', '$checkID', '$title', '$permalink', '$description', '$prep_time', '$cook_time', '$ingred', '$diff', '$serves', '$created', '$updated', '$img_name', '$method', '$status', '$video' )";

        if(mysqli_query($conn, $query)) {
            echo "<script> alert('Recipe added Successfully!') </script>";
            header("location:recipes.php");
        }
        else { 
            echo "<script> alert('Error: Recipe not added') </script>";
        }
        
        mysqli_close($conn);
    }

?>