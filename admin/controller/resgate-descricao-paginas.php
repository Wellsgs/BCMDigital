<?php
	include("../controller/verificar_session_requisicao.php");
	include ("../validacao/echoJson.php");

	$flag['flag'] = 0;

	$meu_array = array(
		"id", 			
	);

	#region verifica session
	if(!verificaSession("permissoes_cargos.php", $conexao))
		echoJson($flag = 1, false);
	#endregion
	
	#region validação da existencia de todos os valores requeridos
	if(empty($_POST)){
		$flag['flag'] = 2;
		echoJson($flag, false);
	}
	
	foreach ($meu_array as $key => $value) {
		
		if(!isset($_POST[$value]) || trim($_POST[$value]) == ""){
			$flag['flag'] = 3;
			echoJson($flag, false);
		}
		else
			$_POST[$value] = strtolower(addslashes(trim($_POST[$value])));
	}
	#endregion	

	if( !is_numeric($_POST['id']) ){
		$flag['flag'] = 4;
		echoJson($flag, false);
	}


	#region resgatando valor
	
	$resp = mysql_query("SELECT descricao FROM paginas2 WHERE id=".$_POST['id']." LIMIT 1;", $conexao);
	

	if(mysql_num_rows($resp) < 1){
		$flag['flag'] = 6;
		echoJson($flag, false);
	}

	$linha = mysql_fetch_array($resp);

	$flag['descricao'] = $linha['descricao'];

	#endregion

	LogSistema(
			$_SERVER ['REQUEST_URI'], 
			"Está pagina resgata as informações de descrição das paginas acessadas pelos usuario", 
			"Pagina solicitada ID = ".$_POST['id'],
			$conexao
		);

	echoJson($flag, false);
?>