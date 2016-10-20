<?php
	include("../controller/verificar_session_requisicao.php");
	include ("../validacao/echoJson.php");

	$flag = 0;

	$meu_array = array(
		"nome", 			
		"descricao"
	);

	#region verifica session
	if(!verificaSession("cadastro_cargo_funcionario.php", $conexao))
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

	#region efetuando cadastro de fornecedor

	$nivel_ = retornoQueryUmaField("SELECT MAX(nivel)+1 AS total FROM cargo_funcionario;", $conexao, "total");
	

	if(!retornoQueryBolleana("INSERT INTO `cargo_funcionario` (`nome`, `descricao`, `nivel`) VALUES ('".$_POST['nome']."', '".nl2br($_POST['descricao'])."', ".$nivel_.");", $conexao)){
		echoJson($flag = 4, false);
	}
	#endregion

	LogSistema(
			$_SERVER ['REQUEST_URI'], 
			"Está cadastra novos cargos de funcionario", 
			"Titulo do cargo = ".$_POST['nome'].", Cargo cadastrado ID = ".mysql_insert_id($conexao),
			$conexao
		);

	echoJson($flag, false);
?>