function validateUserDetails() {
  var First_name = document.updateUserDetails.First_name.value;
  var Last_name = document.updateUserDetails.Last_name.value;
  var Bio = document.updateUserDetails.Bio.value;
  var Location = document.updateUserDetails.Location.value;
  var nameCheck = /^[a-zA-Z]+$/;

  if (First_name==null || First_name==""){  
    alert("First name can't be blank"); 
    return false;
  }
  else if (Last_name==null || Last_name==""){  
    alert("Last name can't be blank");  
    return false;
  }
  else if (!(nameCheck.test(First_name))){  
    alert("First name can only contain alphabets"); 
    return false;
  }
  else if (!(nameCheck.test(Last_name))){  
    alert("Last name can only contain alphabets");  
    return false;
  }
  else if (Last_name==null || Last_name==""){  
    alert("Last name can't be blank");  
    return false;
  }
  else if (First_name.length > 20){  
    alert("First name can't be longer than 20 characters");  
    return false;
  }
  else if (Last_name.length > 20){  
    alert("Last name can't be longer than 20 characters");  
    return false;
  }
  else if (Bio.length > 250 ){  
    alert("Bio can't be longer than 250 characters");  
    return false;
  }
  else if (Location.length > 50 ){  
    alert("Location can't be longer than 50 characters");  
    return false;
  }
  else {
    return true;
  }
   
}