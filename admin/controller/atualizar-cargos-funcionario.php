<?php
	include("../controller/verificar_session_requisicao.php");
	include ("../validacao/echoJson.php");

	$flag = 0;

	$meu_array = array(
		"nome", 			
		"descricao",
		"id"
	);

	#region verifica session
	if(!verificaSession("cadastro_cargo_funcionario_alterar.php", $conexao))
		echoJson($flag = 1, false);
	#endregion
	
	#region validação da existencia de todos os valores requeridos
	if(empty($_POST)){
		echoJson($flag = 2, false);
	}
	
	foreach ($meu_array as $key => $value) {
		
		if(!isset($_POST[$value]) || trim($_POST[$value]) == ""){
			echoJson($flag = 3, false);
		}
		else
			$_POST[$value] = strtolower(addslashes(trim($_POST[$value])));
	}
	#endregion

	if( !is_numeric($_POST['id']))
		echoJson($flag = 4, false);

	#region efetuando cadastro de fornecedor
	if(!retornoQueryBolleana("
		UPDATE `cargo_funcionario` SET nome='".$_POST['nome']."', descricao='".$_POST['descricao']."' WHERE id=".$_POST['id']." LIMIT 1;
		", $conexao)){
		echoJson($flag = 5, false);
	}
	#endregion

	LogSistema(
			$_SERVER ['REQUEST_URI'], 
			"Está pagina atualiza um cargo", 
			"Cargo solicitado ID = ".$_POST['id'],
			$conexao
		);

	echoJson($flag, false);
?>