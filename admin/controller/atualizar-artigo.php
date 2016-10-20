<?php		
	include("verificar_session_requisicao.php");
	include ("../validacao/timeZoneDefault.php");
	include ("../validacao/echoJson.php");
        include ("../public/util/funcoes.php");

	$flag = 0;
        //print_r($_POST);
	$meu_array = array(
            "ds_titulo",
            "dt_artigo",
            "segmento_id",
            "autor_id"
	);
	#region verifica session
	if(!verificaSession("atualizar_artigo.php", $conexao))
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
		
	#region efetuando cadastro de segmento
	if(
		!retornoQueryBolleana(
			"UPDATE artigos SET 
			`ds_titulo` = '".$_POST['ds_titulo']."',
                        `dt_artigo` = '".ConverteData($_POST['dt_artigo'])."',
                        `segmento_id` = '".$_POST['segmento_id']."',
                        `autor_id` = '".$_POST['autor_id']."',
                        `ds_artigo` = '".$_POST['ds_artigo']."'			
			WHERE id=".$_POST['id']." LIMIT 1;"
			, $conexao)
	){
		echoJson($flag = 13, false);
	}
                
        #region gravando uma nova imagem do anuncio
	if ($_FILES['foto_ilustrativa']['tmp_name'] != "") {
		$caminho      = "../datafiles/artigos/".$_POST['id']."/";
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
			"Está pagina faz a atualização de cliente", 
			"Cliente solicitado ID = ".$_POST['id'],
			$conexao
		);

	echoJson($flag, false);
?>