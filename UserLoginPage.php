<!DOCTYPE html>
<html>
<head>
    <title>User Login Page</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="styles/login.css">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/0ba0f621bd.js" crossorigin="anonymous"></script>
    <script src="javascript/check-login.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Glory:wght@300&display=swap" rel="stylesheet">
	  
</head>

<body>

    <?php require "header.php"?>
    
    <div class = "topic">
        <br>
        Login page
        <hr>
        <br>
    </div>
    
    <form name = "login" onsubmit = "return validateLoginDetails()" action = "validateLogin.php" method = "POST">
        <div class = "form-container">   
            <label><b>Email : </b></label>   <br>
            <input type="text" name="email"  placeholder="Enter E-mail" required>  <br>
            <label><b>Password :</b> </label>   <br>
            <input type="password" placeholder="Enter Password" name="password" required>  <br>
            <button type="submit" value = "Login">Login</button><br><br>	
        </div>
    </form>	
    <br>
    <br>

    <?php require "footer.php"?>


</body>
</html>