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
	if(!verificaSession("cadastro_banner_fixo.php", $conexao))
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
	#comentado pois ainda não existe um criterio para evitar cadastro
	/*if(retornoQueryUmaField(
		"SELECT COUNT(*) AS total FROM segmentos WHERE nm_segmento='".$_POST['nm_segmento']."' LIMIT 1;",
		$conexao,
		"total"
			) > 0){
			
		echoJson($flag = 9, false);	
	}*/
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

	#region efetuando cadastro da banner
	if(
		!retornoQueryBolleana(
			"INSERT INTO banner_fixo (`tipo_id`, `cliente_id`, `segmento_id`,`nm_empresa`, `ds_link`, `ic_home`, `dt_inicio`, `dt_expiracao`,`artigo_id`) VALUES (".$_POST['tipo_id'].",".$_POST['cliente_id'].",".$_POST['segmento_id'].",'".$_POST['nm_empresa']."','".$_POST['ds_link']."',".$_POST['ic_home'].",'".$_POST['dt_inicio']."','".$_POST['dt_expiracao']."',".$_POST['artigo_id'].");"
			, $conexao)
	){
		echoJson($flag = 11, false);
	}
	$banner_tarja_id = mysql_insert_id($conexao);
	#endregion

	#region gravando a imagem do banner
	$caminho      = "../datafiles/banner_fixo/".$banner_tarja_id."/";
	if(!is_dir($caminho)){
		mkdir($caminho, 0777, true);
	}
	$data         = explode(".", $_FILES['foto_ilustrativa']['name']);
	$extensao     = $data[1];
	move_uploaded_file($_FILES['foto_ilustrativa']['tmp_name'], $caminho.$banner_tarja_id.".".$extensao);
	#endregion

	LogSistema(
		$_SERVER ['REQUEST_URI'], 
		"Está pagina faz o cadastro de um novo banner fixo", 
		"Nome da empresa = ".$_POST['nm_empresa']."",
		$conexao
	);

	echoJson($flag, false);
?>