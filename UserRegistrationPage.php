<!DOCTYPE html>
<html>  
<head>  
    <title>User Registration page</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="styles/login.css">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/0ba0f621bd.js" crossorigin="anonymous"></script>
    <script src="javascript/check-register.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Glory:wght@300&display=swap" rel="stylesheet">
</head>  


<body> 
  <?php require "header.php"?>
    
  <div class = topic>
      <br>
      Registration page
      <hr>
      <br>
  </div>
    
  <form name = "Register" onsubmit = "return validateRegisterDetails()" action = "validateRegister.php" method = "POST">
      <div class = "form-container">   
          <label> <b>Username :</b> </label>   
          <input type="text" name="Username" placeholder= "Username" size="15" required />     

          <label for="email"><b>Email:</b></label>  
          <input type="text" placeholder="Enter Email" name="email" required>  

          <label for="psw"><b>Password:</b></label>  
          <input type="password" placeholder="Enter Password" name="password" required>  

          <label for="psw-repeat"><b>Re-type Password:</b></label>  
          <input type="password" placeholder="Retype Password" name="passwordCheck" required>  
          <button type="submit" class="signmebtn">SIGN ME UP</button><br><br>	
      </div>
  </form>	
  <br>
  <br>

  <?php require "footer.php"?>
</body>  
</html> 