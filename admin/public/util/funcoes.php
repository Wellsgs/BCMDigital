<?php
	 function tratar_erros($erro_numero)
	 {
		 $mensagem_erro = "";
		 switch($erro_numero)
		 {
			case 1045:  $mensagem_erro = "O usuario ou senha sao invalidos, favor rever isso";break;
            case 1146:  $mensagem_erro = "Essa tabela não existe";break;			
			default: $mensagem_erro = "Erro nao identificado";break;
		 }
         return $mensagem_erro;		 
	 }
	 
	 function alerta($mensagem)
	 {
		echo '<script>alert("'.$mensagem.'");</script>'; 
	 }
	 
	 function voltar()
	 {
		 echo "<script>history.back();</script>"; 
	 }
	 
	 function direciona($para_url)
	 {
		 echo '<script>window.location="'.$para_url.'"</script>';
	 }
	 
	 function formata_money($valor)
	 {
		 return 'R$ '.number_format($valor,2,',','.');
	 }
	 
	 function ConverteData($Data){
 	 if (strstr($Data, "/"))  //verifica se tem a barra /
	 {
  		 $d = explode("/", $Data);  //tira a barra
		 $rstData = "$d[2]-$d[1]-$d[0]";  //separa as datas $d[2] = ano $d[1] = mes etc...
		 return $rstData;
	 }elseif(strstr($Data, "-")){
			 $d = explode ("-", $Data);
			 $rstData = "$d[2]/$d[1]/$d[0]";
			 return $rstData;
	 }else{
 			return NULL;
 	 }
 	 }
	 
	 /*FUNCAO PARA CONTAR O INTERVALO DE DIAS*/
	 /*EXEMPLO: /echo intervalo('2010-12-10', '2010-12-30').' dias';	 */
	 function intervalo($inicio, $fim){
	     $dataInicio = strtotime($inicio);
	     $dataFim    = strtotime($fim);
	     $intervalo  = ($dataFim-$dataInicio) - 86400;
	    return date('d', $intervalo);
	 }
	 /*FINAL DA FUNCAO*/
	
	/*FUNCAO PARA VERIFICACAO DE DETERMINADO IP*/
							/*IP - PORTA*/  
	//$conectado = @ fsockopen('192.168.0.139', 135, $numeroDoErro, $stringDoErro, 10); // Este último é o timeout, em segundos	  
	/*FINAL DA FUNCAO*/
	
	/*FUNCAO PARA CRIACAO DE XML E EXEMPLO DE USO*/
		function addContato($document, $nome, $fone, $end)
		{
		 #criar contato
		 $contato = $document->createElement("contato");
		 
//		 #criar nó nome
		 $nomeElm = $document->createElement("nome", $nome);
//		 
//		 #fone
		 $foneElm = $document->createElement("telefone", $fone);
//		 
//		 #endereco
		 $endElm = $document->createElement("endereco", $end);
//		 
		 $contato->appendChild($nomeElm);
		 $contato->appendChild($foneElm);
		 $contato->appendChild($endElm);
		 return $contato;
		}
//		
//		$dom = new DOMDocument("1.0", "ISO-8859-1");
//		$dom->preserveWhiteSpace = false;
//		$dom->formatOutput = true;
//		
//		$root = $dom->createElement("agenda");
//		
//		#utilizando a funcao para criar contatos
//		$Tiao = addContato($dom, "Tiao J.", "5555-4444", "R. Jaú, 3");
//		$Joao = addContato($dom, "Joao S.", "4444-5555", "R. Itú, 4");
//		
//		#adicionando no root
//		$root->appendChild($Tiao);
//		$root->appendChild($Joao);
//		$dom->appendChild($root);
//		
//		#salvando o arquivo
//		$dom->save("agenda.xml");
//		
//		#mostrar dados na tela
//		header("Content-Type: text/xml");
//		print $dom->saveXML();
	/*FINAL DA FUNCAO*/

	//essa função foi feita para os caracteres especiais
	function caracteresEsp($texto){
		$frase = str_replace("&#201;","É",$texto);	
		$frase = str_replace("&#233;","É",$frase);								
		$frase = str_replace("&#202;","Ê",$frase);										
		$frase = str_replace("&#205;","Í",$frase);						
		$frase = str_replace("&#213;","Õ",$frase);	
		$frase = str_replace("&#245;","Õ",$frase);					
		$frase = str_replace("&#211;","Ó",$frase);						
		$frase = str_replace("&#227;","Ã",$frase); //estava:ã
		$frase = str_replace("&#231;","Ç",$frase);
		$frase = str_replace("&#234;","ê",$frase);		
		$frase = str_replace("&#237;","Í",$frase);				
		$frase = str_replace("&#225;","á",$frase);		
		$frase = str_replace("&#199;","Ç",$frase);				
		$frase = str_replace("&#195;","Ã",$frase);						
		$frase = str_replace("&#192;","À",$frase);				
		$frase = str_replace("&#193;","Á",$frase);
		$frase = str_replace("&#186;","°",$frase); 
		$frase = str_replace("&#176;","°",$frase);
		$frase = str_replace("?","É",$frase);	
		$frase = str_replace("&quot;",'"',$frase);			
		return $frase;
	}
	
	function formatarCPF_CNPJ($campo, $formatado = true){
		//$codigoLimpo = preg_match("[' '-./ t]",'',$campo);
		$codigoLimpo = str_replace(" ","",$campo);
		$codigoLimpo = str_replace("-","",$campo);		
		$codigoLimpo = str_replace(".","",$campo);		
		$codigoLimpo = str_replace("/","",$campo);		

		// pega o tamanho da string menos os digitos verificadores
		$tamanho = (strlen($codigoLimpo) -2);
		//verifica se o tamanho do código informado é válido
		if ($tamanho != 6 && $tamanho != 9 && $tamanho != 10 && $tamanho != 12){
			return false; 
		}
		if ($formatado){ 
			if ($tamanho == 9 ){
				$mascara = "###.###.###-##" ;
			}elseif($tamanho == 10){
				$mascara = "###.###.###.###";
			}elseif($tamanho == 12 ){
				$mascara = "##.###.###/####-##";
			}elseif($tamanho == 6 ){
				$mascara = "#####-###";
			}
			
			$indice = -1;
			for ($i=0; $i < strlen($mascara); $i++) {
				if ($mascara[$i]=='#') $mascara[$i] = $codigoLimpo[++$indice];
			}
			//retorna o campo formatado
			$retorno = $mascara;
	 
		}else{
			//se não quer formatado, retorna o campo limpo
			$retorno = $codigoLimpo;
		}
	 
		return $retorno;
	}
	
	function limitarString($string, $inicio, $length){
    	if(strlen($string) <= $length)
        	return $string;
        $corta = substr($string, $inicio, $length);
        $espaco = strrpos($corta, ' ');
        return substr($string, $inicio, $espaco);
    }
	
	function limitarTexto($texto, $inicio, $limite){
		$texto = substr($texto, $inicio, strrpos(substr($texto, $inicio, $limite), ' '));
	    return $texto;
		
	}
	
	function remover($texto){
		$texto = eregi_replace("[àáâäã]","a",$texto);
		$texto = eregi_replace("[èéêë]","e",$texto);
		$texto = eregi_replace("[ìíîï]","i",$texto);
		$texto = eregi_replace("[òóôöõ]","o",$texto);
		$texto = eregi_replace("[ùúûü]","u",$texto);
		$texto = eregi_replace("[ÀÁÂÄÃ]","A",$texto);
		$texto = eregi_replace("[ÈÉÊË]","E",$texto);
		$texto = eregi_replace("[ÌÍÎÏ]","I",$texto);
		$texto = eregi_replace("[ÒÓÔÖÕ]","O",$texto);
		$texto = eregi_replace("[ÙÚÛÜ]","U",$texto);
		$texto = eregi_replace("ç","c",$texto);
		$texto = eregi_replace("Ç","C",$texto);
		$texto = eregi_replace("ñ","n",$texto);
		$texto = eregi_replace("Ñ","N",$texto);
		return $texto;
	}
	
	function data_hora_portugues($data){
		$ano= substr($data, 0,4);
		$mes= substr($data, 5,2);
		$dia= substr($data, 8,2);
		if(substr($data, 11,2)== ""){
			$data= $dia."/".$mes."/".$ano;
			return $data;
		}else{
			$hora= substr($data, 11,2);
			$minuto= substr($data, 14,2);
			$segundo= substr($data, 17,2);
			$data= $dia."/".$mes."/".$ano." ".$hora.":".$minuto.":".$segundo;
			return $data;
		}
	}

	function moeda($valor){
		$valor = number_format($valor,2,',','.');
		return $valor;
	}
	
	function moedaSql($valor){
		$valor = str_replace('.','',$valor);
		$valor = str_replace(',','.',$valor);
		return $valor;
	}	

	function PegaImagemPasta($caminho){
                $files   = glob("$caminho/*.*");
                $arquivo = $files[0];
		return $arquivo;
	}

	function DadosDaImagem($caminho,$tipo_informacao){
        $imnfo = getimagesize($caminho);
        switch ($tipo_informacao) {
            case "largura":
                return $imnfo[0];
                break;
            case "altura":
                return $imnfo[1];
                break;
            case "extensão":
                return $imnfo[2];
                break;
            case "mime-type":
                return $imnfo['mime'];
                break;    
        }
    }
	 
?>