<?php
	include("../controller/verificar_session_requisicao.php");
	include ("../validacao/echoJson.php");

	$flag = 0;

	$meu_array = array(
		"nome",
                "email",
                "contato",
                "telefone"
		
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
		
		if(!isset($_POST[$value]) || trim($_POST[$value]) == ""){
			echoJson($flag = 3, false);
		}
		else
			$_POST[$value] = strtolower(addslashes(trim($_POST[$value])));
	}
	#endregion

	#region efetuando cadastro de fornecedor

	//$nivel_ = retornoQueryUmaField("SELECT MAX(nivel)+1 AS total FROM clientes;", $conexao, "total");
	
	if(!retornoQueryBolleana("INSERT INTO clientes (nm_cliente, ds_email, nm_contato, nr_telefone) VALUES ('".$_POST['nome']."', '".$_POST['email']."', '".$_POST['contato']."', '".$_POST['telefone']."');", $conexao)){
		echoJson($flag = 4, false);
	}
	#endregion

	LogSistema(
			$_SERVER ['REQUEST_URI'], 
			"Está cadastrado o novo cliente", 
			"Nome do cliente = ".$_POST['nome'],
			$conexao
		);

	echoJson($flag, false);
?>