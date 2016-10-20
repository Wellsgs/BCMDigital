function validaEmail(email){
	if(email.length < 5)
		return false;
		
	if (email.indexOf("@") < 1 || email.indexOf('.') < 1)	
		return false;
	else
		return true;
	
}
