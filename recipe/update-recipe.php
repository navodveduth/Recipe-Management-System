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

<?php 

    if(isset($_POST['submit'])) {
        $Title = $_POST['title'];
        $Category = $_POST['category']; 
		$Permalink = $_POST['p_link'];
        $R_description = $_POST['description'];
        $Prep_time = $_POST['prepare_time'];
        $Cook_time = $_POST['cook_time'];
        $Ingredients = $_POST['ingredients'];
        $Difficulty = $_POST['difficulty'];
        $No_of_servings = $_POST['serves'];
        $Created_timestamp = $_POST['created'];
        $Updated_timestamp = $_POST['updated'];
        $Instructions = $_POST['method'];
        $R_status = $_POST['status'];
        $Video_link = $_POST['video'];

        $img_dir = "../images/recipe/";
        $image_file = $img_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image_file);
        $img_name = basename($_FILES["image"]["name"]);
        $img_check = "";

        $ck_img = mysqli_query($conn, "SELECT * FROM recipe WHERE permalink='$permalink'");

        if(mysqli_num_rows($ck_img) > 0){
            while($row = mysqli_fetch_assoc($ck_img)){
            $dbimage = $row['Recipe_image'];
            }
        }

        if($img_name == "") {
            $img_check =  $dbimage;
            echo "<script> alert('null')";
        }
        else {
            $img_check = $img_name;
            echo "<script> alert('new')";
        }

        $ck_query = mysqli_query($conn, "SELECT * FROM recipe WHERE permalink='$permalink'");

        if(mysqli_num_rows($ck_query ) != 0)
        {
            echo "<script> alert('Permalink already exist!!!') </script>";
        }
        else 
        {
            $query = "UPDATE recipe SET Title='$Title', Category='$Category', Permalink='$Permalink', R_description='$R_description', Prep_time='$Prep_time', Cook_time = '$Cook_time', Ingredients='$Ingredients', Difficulty='$Difficulty', No_of_servings='$No_of_servings', Created_timestamp='$Created_timestamp', Updated_timestamp = '$Updated_timestamp', Recipe_image ='$img_check', Instructions='$Instructions', R_status='$R_status', Video_link='$Video_link' WHERE Permalink='$Permalink'";
        
            if (mysqli_query($conn, $query))  {
                echo "<script> alert('Updated successfully!!!')";
                header("location:recipes.php");
            }
            else {
                echo "<script> alert('Error!!!')";
            
            }
        }
    }
?>