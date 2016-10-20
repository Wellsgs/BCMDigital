<?php		
	include("verificar_session_requisicao.php");
	include ("../validacao/timeZoneDefault.php");
	include ("../validacao/echoJson.php");	

	$flag = 0;

	$meu_array = array(
		"nm_tipo"
	);

	#region verifica session
	if(!verificaSession("atualizar_tipo.php", $conexao))
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
		
	#region efetuando cadastro de fornecedor
	if(
		!retornoQueryBolleana(
			"UPDATE tipos SET 
			`nm_tipo`= '".$_POST['nm_tipo']."'
			WHERE id=".$_POST['id']." LIMIT 1;"
			, $conexao)
	){
		echoJson($flag = 13, false);
	}
	#endregion

	LogSistema(
			$_SERVER ['REQUEST_URI'], 
			"Está pagina faz a atualização de tipo", 
			"Tipo solicitado ID = ".$_POST['id'],
			$conexao
		);

	echoJson($flag, false);
?>