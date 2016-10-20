<?php
	include("../controller/verificar_session_requisicao.php");
	include ("../validacao/echoJson.php");

	$flag = 0;

	$meu_array = array(
		"id", 			
	);

	#region verifica session
	if(!verificaSession("deletar-cargos-funcionario.php", $conexao))
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
			$_POST[$value] = addslashes(trim($_POST[$value]));
	}
	#endregion

	if(!is_numeric($_POST['id']))
		echoJson($flag = 4, false);

	#region verifica se a categoria é vazia
		if(retornoQueryUmaField(
			"SELECT COUNT(*) AS total FROM funcionario WHERE cargo=".$_POST['id']." LIMIT 1;",
			$conexao,
			"total"
			)
			> 0)
	echoJson($flag = 5, false);
	#endregion
	
	/*$nivel = retornoQueryUmaField(
			"SELECT nivel FROM cargo_funcionario WHERE id=".$_POST['id']." LIMIT 1;",
			$conexao,
			"nivel"
			);
	*/
	#region efetuando cadastro de fornecedor
	if(!retornoQueryBolleana("DELETE FROM cargo_funcionario WHERE id=".$_POST['id']." LIMIT 1;", $conexao)){
		echoJson($flag = 6, false);
	}
	#endregion

	LogSistema(
			$_SERVER ['REQUEST_URI'], 
			"Está pagina remove um cargo de funcionario", 
			"Cargo solicitado ID = ".$_POST['id'],
			$conexao
		);

	echoJson($flag, false);
?>