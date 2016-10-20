// JavaScript Document
// JavaScript Document
function muda_cor_over(celula)
{
	celula.style.backgroundColor="#F2F0A2";
}


function muda_cor_out(celula)
{
	celula.style.backgroundColor="#999";
}

function verifica_fornecedor(formulario)
 {
	     var cabecalho = ""
	     var preencher= "";
		 var erros=0;
		 
		 if (formulario.for_razaosocial.value == "")
		 {
			 preencher += "- RAZAO SOCIAL\n";
			 erros++;
		 }
		 if (formulario.for_nome_fantasia.value == "")
		 {
			 preencher += "- NOME FANTASIA\n";
			 erros++;
		 }
		 
		 if (erros == 1)
		    cabecalho = "O campo abaixo deve ser preenchido:\n\n";
		 else
		    cabecalho = "Os campos abaixo devem ser preenchidos:\n\n";
		 
		 cabecalho += preencher;
		 
		 if (erros > 0)
		 {
			     alert(cabecalho);
				 return false; 
		 }
		 
	 }
	 
	 //função para a criação de máscaras nos campos
	function formata_mascara(campo_passado, mascara) 
	{
		var campo = campo_passado.value.length;
		var saida = mascara.substring(0,1);
		var texto = mascara.substring(campo);
		if(texto.substring(0,1) != saida) 
		{
			campo_passado.value += texto.substring(0,1);
	    }			
	}