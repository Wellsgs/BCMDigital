<?php		
	include("verificar_session_requisicao.php");
	include ("../validacao/timeZoneDefault.php");
	include ("../validacao/echoJson.php");	
	//echo "<pre>"; var_dump($_POST);exit();
	$flag = 0;

	$meu_array = array(
		"nm_empresa",
		"cliente_id",
		"dt_inicio",
		"dt_expiracao",
		"ds_link",
		"titulo_noticia"		
	);

	#region verifica session
	if(!verificaSession("atualizar_ultimas_noticias.php", $conexao))
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

	#region validacao data
	include ("../public/util/funcoes.php");
	$_POST['dt_inicio']    = ConverteData($_POST['dt_inicio']);
	$_POST['dt_expiracao'] = ConverteData($_POST['dt_expiracao']);
	#endregion

	#region verificar se a data de inicio e menor que a data atual
	if (strtotime($_POST['dt_inicio']) < strtotime(date("Y-m-d")) || strtotime($_POST['dt_expiracao']) < strtotime(date("Y-m-d"))) {
	    echoJson($flag = 12, false);
	}
	#endregion

	#region efetuando atualizacao de ultimas noticias
	if(
		!retornoQueryBolleana(
			"UPDATE ultimas_noticias SET 
			`cliente_id`= ".$_POST['cliente_id'].",
			`nm_empresa`= '".$_POST['nm_empresa']."',
			`ds_link`= '".$_POST['ds_link']."',
			`dt_inicio`= '".$_POST['dt_inicio']."',
			`dt_expiracao`= '".$_POST['dt_expiracao']."',
			`titulo_noticia`= '".$_POST['titulo_noticia']."'
			WHERE id=".$_POST['id']." LIMIT 1;"
			, $conexao)
	){
		echoJson($flag = 13, false);
	}
	#endregion

	LogSistema(
		$_SERVER ['REQUEST_URI'], 
		"Está pagina faz a atualização de ultimas noticias", 
		"Ultima Noticia solicitado ID = ".$_POST['id'],
		$conexao
	);

	echoJson($flag, false);
?>