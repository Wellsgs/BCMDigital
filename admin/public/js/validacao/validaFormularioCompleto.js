/* Requer jQuery no codigo com $ de referencia do framework*/
function validaFormularioCompleto(str){
	var msg = "";	
	$(str).each(function(){
		if($.trim($(this).val()) == ""){
			msg = $(this).attr("placeholder");			
			return false;
		}	
	});		

	return msg;
}