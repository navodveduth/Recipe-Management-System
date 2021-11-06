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

    if(isset($_POST['submit'])) {
        $First_name = $_POST['First_name'];
        $Last_name = $_POST['Last_name'];
        $Bio = $_POST['Bio'];
        $Gender = $_POST['Gender'];
        $Location = $_POST['Location'];

        $img_dir = "../images/profile/";
        $image_file = $img_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image_file);
        $img_name = basename($_FILES["image"]["name"]);
        $img_check;

        $ck_query = mysqli_query($conn, "SELECT * FROM profile_details WHERE UserID ='$checkID'");

        if(mysqli_num_rows($ck_query) > 0){
            while($row = mysqli_fetch_assoc($ck_query)){
            $dbimage = $row['Profile_image'];
            }
        }

        if($img_name == "") {
            $img_check =  $dbimage;
        }
        else {
            $img_check = $img_name;
        }


        $query = "UPDATE profile_details SET First_name = '$First_name', Last_name = '$Last_name', Bio = '$Bio', Gender = '$Gender', Location = '$Location', Profile_image = '$img_check' WHERE UserID = '$checkID'";

        if (mysqli_query($conn, $query)) {
            echo '<script language="javascript">'.'alert("Peronal details updated successfully")'.'</script>';
            //header('Location: user-dashboard/user-dashboard.php');
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        
        
    }

    /* referance from www.w3schools.com*/
?>