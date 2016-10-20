<?php		
	include("verificar_session_requisicao.php");
	include ("../validacao/timeZoneDefault.php");
	include ("../validacao/echoJson.php");	

	$flag = 0;

	$meu_array = array(
            "nm_cliente",
            "ds_email",
            "nm_contato",
            "nr_telefone"
	);
        
	
	#region verifica session
	if(!verificaSession("cadastro_cliente.php", $conexao))
		echoJson($flag = 1, false);
	#endregion

	#region validação da existencia de todos os valores requeridos
	if(empty($_POST)){
		echoJson($flag = 2, false);
	}
	
	foreach ($meu_array as $key => $value) {
		
		if(!isset($_POST[$value]) || (trim($_POST[$value]) == "" )){
			echoJson($flag = 3, false);
		}
		else
			$_POST[$value] = addslashes(trim($_POST[$value]));
	}
	#endregion			
	
	#region verifica se existe algum cadastro efetuado anteriormente nome
	if(retornoQueryUmaField(
		"SELECT COUNT(*) AS total FROM clientes WHERE nm_segmento='".$_POST['nm_cliente']."' LIMIT 1;",
		$conexao,
		"total"
			) > 0){
			
		echoJson($flag = 9, false);	
	}
	#endregion	

	#region efetuando cadastro da segmento
	if(
		!retornoQueryBolleana(
			"INSERT INTO clientes (`nm_cliente`, `ds_email`, `nm_contato`, `nr_telefone`)VALUES ('".$_POST['nm_cliente']."','".$_POST['ds_email']."','".$_POST['nm_contato']."','".$_POST['nr_telefone']."');"
			, $conexao)
	){
		echoJson($flag = 11, false);
                
	}
	#endregion

	LogSistema(
			$_SERVER ['REQUEST_URI'], 
			"Está pagina faz o cadastro de um novo cliente", 
			"Nome do cliente = ".$_POST['nm_cliente']."",
			$conexao
		);

	echoJson($flag, false);
?>