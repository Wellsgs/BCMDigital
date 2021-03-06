<?php		
	include("verificar_session_requisicao.php");
	include ("../validacao/timeZoneDefault.php");
	include ("../validacao/echoJson.php");	

	$flag = 0;

	$meu_array = array(
		"nm_galeria"	
	);
	
	#region verifica session
	if(!verificaSession("cadastro_galerias_videos.php", $conexao))
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
		"SELECT COUNT(*) AS total FROM galeriavideos WHERE nm_galeria='".$_POST['nm_galeria']."' LIMIT 1;",
		$conexao,
		"total"
			) > 0){
			
		echoJson($flag = 9, false);	
	}
	#endregion	

	#region efetuando cadastro da galeriavideos
	if(
		!retornoQueryBolleana(
			"INSERT INTO galeriavideos (`nm_galeria`) VALUES ('".$_POST['nm_galeria']."');"
			, $conexao)
	){
		echoJson($flag = 11, false);
	}
	#endregion

	LogSistema(
			$_SERVER ['REQUEST_URI'], 
			"Está pagina faz o cadastro de um nova galeria videos", 
			"Nome da galeria = ".$_POST['nm_galeria']."",
			$conexao
		);

	echoJson($flag, false);
?>