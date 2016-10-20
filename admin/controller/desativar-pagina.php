<?php
	include("../controller/verificar_session_requisicao.php");
	include ("../validacao/echoJson.php");

	$flag = 0;

	$meu_array = array(
		"endpag", 			
		"endcargo"
	);

	#region verifica session
	if(!verificaSession("permissoes_cargos.php", $conexao))
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
	if(!retornoQueryBolleana("
		DELETE FROM permissoes WHERE id_cargo=".$_POST['endcargo']." AND pagina=".$_POST['endpag']." LIMIT 1;
		", $conexao)){
		echoJson($flag = 4, false);
	}
	#endregion

	LogSistema(
			$_SERVER ['REQUEST_URI'], 
			"Está pagina remove a permissão de acesso de um cargo a uma pagina", 
			"Cargo solicitado ID = ".$_POST['endcargo'].", Pagina solicitada = ".$_POST['endpag'],
			$conexao
		);

	echoJson($flag, false);
?>