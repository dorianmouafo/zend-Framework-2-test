function checkPassword(str){
		    // at least one number, one lowercase and one uppercase letter
            // at least six characters
            var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
		    return re.test(str);
}

function definetext(str){
	var re = /^\w+$/;
	return re.test(str);
}

function  user_signup(registerform){
	
	 	if(registerform.USER_IDENTIFY_NUMBER.value==""){
	 		alert("Error: Please enter the value of indentity number");
	 		registerform.USER_IDENTIFY_NUMBER.focus();
	 		return false;
	 	}
	 	
	 	if(!definetext(registerform.USER_NAME.value=="")){
	 		alert("Error: please enter the value of name only letters, numbers and underscores!");
	 		registerform.USER_NAME.focus();
	 		return false;
	 	}
	 	
	 	if(registerform.USER_SURNAME.value==""){
	 		alert("Error: Please enter the value of Surname");
	 		registerform.USER_SURNAME.focus();
	 		return false;
	 	}
	 	
	 	if(registerform.USER_PHONE_NUMBER.value==""){
	 		alert("Error: Please enter a correct phone number");
	 		registerform.USER_PHONE_NUMBER.focus();
	 		return false;
	 	}
	 	
	 	if(registerform.USER_EMAIL.value==""){
	 		alert("Error: Please enter a valide email");
	 		registerform.USER_EMAIL.focus();
	 		return false;
	 	}
	 	if(registerform.USER_USERNAME.value==""){
	 		alert("Error: Please enter the value of User name");
	 		registerform.USER_USERNAME.focus();
	 		return false;
	 		
	 	}
	 	
	 	if(registerform.USER_PASSWORD.value!="" && registerform.USER_PASSWORD.value==registerform.USER_PASSWORD1.value){
	 		  if(!checkPassword(registerform.USER_PASSWORD.value)){
	 		  	    alert("The password you have entered is not valid!");
			        form.USER_PASSWORD.focus();
			        return false;
	 		  }
	 	}else{
	 		alert("Error: Please check that you've entered and confirmed your password!");
	 		registerform.USER_PASSWORD.focus();
	 		return false;
	 	}
	 	return true;
}


