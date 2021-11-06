function validateLoginDetails() {
    var User_email = document.login.email.value;
    var User_Password = document.login.password.value;
    var emailCheck = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/; /* reference from stackoverflow.com */
    var passwordCheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{10,30}$/; /* reference from stackoverflow.com */
  
    if (User_email==null || User_email==""){  
      alert("Email name can't be blank");  
      return false;
    }
    else if (User_Password==null || User_Password==""){  
        alert("Password name can't be blank");  
        return false;
    }
    else if (!(emailCheck.test(User_email))){  
        alert("Email is in invalid format"); 
        return false;
    }
    else if (!(passwordCheck.test(User_Password))){  
        alert("Password must have a capital letter, simple letter, numeral and special character. Password length should be between 10 and 30"); 
        return false;
    }
    else if (User_email.length > 50){  
        alert("Email can't be longer than 50 characters");  
        return false;
    }
    else {
      return true;
    }
     
  }