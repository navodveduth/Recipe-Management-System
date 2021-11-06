<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/info.css">

</head>

<body>
    <?php require "header.php" ;?>


    <div class="fm-container">
        <form action="" method="POST">
            <br>
            <label class="topic" style="padding: 1rem 0 1rem 1rem;">How can we help ?</label>
            <br><br>
            <input type="text" id="name" name="name" placeholder="Name">

            <input type="text" id="email" name="email" placeholder="Email">

            <input type="text" id="subject" name="subject" placeholder="Subject" style="width: 50%;">

            <textarea id="msg" name="msg" placeholder="Message" rows="5" cols="54"></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>
    <div class="web-info-container">
        <br>
        <label class="topic" style="padding: 1rem 0 3rem 1rem;">Contact Us</label>
        <br><br>
        <br>
        <label class="ctopic"><i class="fas fa-phone-square-alt"
                style="font-size: 35px; padding-right:1rem;"></i>Contact
            Number</label>
        <br><br>
        <br>
        <label class="ctopic"><i class="far fa-paper-plane"
                style="font-size: 35px; padding-right:1rem;"></i>Email</label>
        <br><br>
        <br>
        <label class="ctopic"><i class="fas fa-globe-americas"
                style="font-size: 35px; padding-right:1rem;"></i>Website</label>
        <br><br>
    </div>
    <?php require "footer.php" ;?>
</body>

</html>

<?php 
  if(isset($_POST['submit'])) {
      $name = $_POST["name"];
      $email = $_POST["email"];
      $subject = $_POST["subject"];
      $msg = $_POST["msg"];
      $f_time = date('Y-m-d h m s');

      $query = "INSERT INTO Feedback (Feedback_title, Feedback_desc, Feedback_timestamp) VALUES ('$subject', '$msg', '$f_time')";
      
      /* Feedback alert */
      if(mysqli_query($conn, $c_query)) {
          echo "<script> alert('Feedback added Successfully!') </script>";
      }
      else { 
          echo "<script> alert('Error: Feedback not added') </script>";
      }
  }
?>