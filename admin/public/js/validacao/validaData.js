function validaData(str){

	var data = new Date();				
	var dia  = data.getDate();
	var mes  = (data.getMonth()+1);
	var ano  = data.getFullYear();

	str = str.split('/');

	if(str[0] > 31 || str[0] < 1)
		return false;

	if(str[1] > 12 || str[1] < 1)
		return false;

	if(str[2] > ano || str[2] < (ano-100))
		return false;
	
	if(str[1] > mes && str[2] >= ano)
		return false;

	if(str[0] > dia && str[1] >= mes && str[2] >= ano)
		return false;

	return true;
}