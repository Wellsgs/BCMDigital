<?php		
	include("verificar_session_requisicao.php");
	include ("../validacao/timeZoneDefault.php");
	include ("../validacao/echoJson.php");	
	include ("../public/util/funcoes.php");
	
	//echo "<pre>"; var_dump($_FILES);exit();
	$flag = 0;

	$meu_array = array(
		"nm_empresa",
		"cliente_id",		
		"semana_id",
		"ds_link"		
	);

	#region verifica session
	if(!verificaSession("atualizar_anuncio.php", $conexao))
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
	/*$_POST['dt_inicio']    = ConverteData($_POST['dt_inicio']);
	$_POST['dt_expiracao'] = ConverteData($_POST['dt_expiracao']);*/
	#endregion

	#region dimensoes da imagem
	if ($_FILES['foto_ilustrativa']['tmp_name'] != "") {
		if(DadosDaImagem($_FILES['foto_ilustrativa']['tmp_name'],"largura") != "330"){
			echoJson($flag = 20, false);
		}

		if(DadosDaImagem($_FILES['foto_ilustrativa']['tmp_name'],"altura") != "242"){
			echoJson($flag = 21, false);
		}	
	}
	#endregion

	#region validacao Exclusivo na Home
	/*if (isset($_POST['ic_home'])) {
		$_POST['ic_home'] = ($_POST['ic_home'] == 'sim') ? 1 : 0;
	}else{
		$_POST['ic_home'] = 0;
	}*/	
	#endregion

	#region validacao artigo
	if (isset($_POST['artigo_id']) && $_POST['artigo_id'] != "") {
		$_POST['artigo_id'] = $_POST['artigo_id'];
	}else{
		$_POST['artigo_id'] = "NULL";
	}	
	#endregion

	#region efetuando ataualizacao de anuncios
	if(
		!retornoQueryBolleana(
			"UPDATE anuncios SET 
			`cliente_id`= ".$_POST['cliente_id'].",
			`artigo_id` = ".$_POST['artigo_id'].",
			`segmento_id`= ".$_POST['segmento_id'].",
			`semana_id`= ".$_POST['semana_id'].",
			`nm_empresa`= '".$_POST['nm_empresa']."',
			`ds_link`= '".$_POST['ds_link']."'			
			WHERE id=".$_POST['id']." LIMIT 1;"
			, $conexao)
	){
		echoJson($flag = 13, false);
	}
	#endregion

	#region gravando uma nova imagem do anuncio
	if ($_FILES['foto_ilustrativa']['tmp_name'] != "") {
		$caminho      = "../datafiles/anuncios/".$_POST['id']."/";
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
		"Está pagina faz a atualização de anuncios", 
		"Anúncios solicitado ID = ".$_POST['id'],
		$conexao
	);

	echoJson($flag, false);
?>