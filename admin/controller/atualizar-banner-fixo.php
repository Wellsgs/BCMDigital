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
		"tipo_id"		
	);

	#region verifica session
	if(!verificaSession("atualizar_banner_fixo.php", $conexao))
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

	#region validacao Exclusivo na Home
	if (isset($_POST['ic_home'])) {
		$_POST['ic_home'] = ($_POST['ic_home'] == 'sim') ? 1 : 0;
	}else{
		$_POST['ic_home'] = 0;
	}	
	#endregion	

	if ($_POST['artigo_id'] == "0") {
		$_POST['artigo_id'] = 0;
	}

	#region efetuando atualizacao de banner fixo
	if(
		!retornoQueryBolleana(
			"UPDATE banner_fixo SET 
			`tipo_id`= ".$_POST['tipo_id'].",
			`cliente_id`= ".$_POST['cliente_id'].",
			`segmento_id`= ".$_POST['segmento_id'].",
			`artigo_id`= ".$_POST['artigo_id'].",
			`nm_empresa`= '".$_POST['nm_empresa']."',
			`ds_link`= '".$_POST['ds_link']."',
			`ic_home`= ".$_POST['ic_home'].",
			`dt_inicio`= '".$_POST['dt_inicio']."',
			`dt_expiracao`= '".$_POST['dt_expiracao']."'
			WHERE id=".$_POST['id']." LIMIT 1;"
			, $conexao)
	){
		echoJson($flag = 13, false);
	}
	#endregion

	#region gravando uma nova imagem do banner fixo
	if ($_FILES['foto_ilustrativa']['tmp_name'] != "") {
		$caminho      = "../datafiles/banner_fixo/".$_POST['id']."/";
		if(!is_dir($caminho)){
			mkdir($caminho, 0777, true);
		}
		$arquivo = PegaImagemPasta($caminho);		
		unlink($arquivo);
		$data         = explode(".", $_FILES['foto_ilustrativa']['name']);
		$extensao     = $data[1];
		move_uploaded_file($_FILES['foto_ilustrativa']['tmp_name'], $caminho.$_POST['id'].".".$extensao);
	}
	#endregion

	LogSistema(
		$_SERVER ['REQUEST_URI'], 
		"Está pagina faz a atualização de banner fixo", 
		"Banner fixo solicitado ID = ".$_POST['id'],
		$conexao
	);

	echoJson($flag, false);
?>