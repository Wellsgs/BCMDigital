<?php		
	include("verificar_session_requisicao.php");
	include ("../validacao/timeZoneDefault.php");
	include ("../validacao/echoJson.php");
        include ("../public/util/funcoes.php");

	$flag = 0;
        //print_r($_POST);
	$meu_array = array(
            "nm_autor"
	);

	#region verifica session
	if(!verificaSession("atualizar_autor.php", $conexao))
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
			"UPDATE autores SET 
			`nm_autor`      = '".$_POST['nm_autor']."',
                        `id_segmento`   = '".$_POST['id_segmento']."',
                        `ds_frase`      = '".$_POST['ds_frase']."',        
			`ds_frase_autor`= '".$_POST['ds_frase_autor']."'
			WHERE id=".$_POST['id']." LIMIT 1;"
			, $conexao)
	){
		echoJson($flag = 13, false);
	}
        
        #Region atualiza redes social
        //Update Facebook
        $sql_facebook = "UPDATE rede_social_autor SET 
			`ds_link`   = '".$_POST['ds_link_facebook']."'                       
			WHERE id_autor =".$_POST['id']." AND id_rede_social = 1;";			
       
        if(!retornoQueryBolleana($sql_facebook, $conexao)){
            echoJson($flag = 14, false);
        }
        
        //Update Twitter
        $sql_twitter = "UPDATE rede_social_autor SET 
			`ds_link`   = '".$_POST['ds_link_twitter']."'                       
			WHERE id_autor =".$_POST['id']." AND id_rede_social = 2;";			
       
        if(!retornoQueryBolleana($sql_twitter, $conexao)){
            echoJson($flag = 15, false);
        }
        
        //Update Instagram
        $sql_instagram = "UPDATE rede_social_autor SET 
                         `ds_link`   = '".$_POST['ds_link_instagram']."'                       
                         WHERE id_autor =".$_POST['id']." AND id_rede_social = 3;";			
       
        if(!retornoQueryBolleana($sql_instagram, $conexao)){
            echoJson($flag = 16, false);
        }
        
        #region gravando uma nova imagem do anuncio
	if ($_FILES['foto_autor']['tmp_name'] != "") {
		$caminho      = "../datafiles/autores/".$_POST['id']."/";
		if(!is_dir($caminho)){
			mkdir($caminho, 0777, true);
		}
		$arquivo = PegaImagemPasta($caminho);		
		unlink($arquivo);
		$data         = explode(".", $_FILES['foto_autor']['name']);
		$extensao     = $data[1];
		move_uploaded_file($_FILES['foto_autor']['tmp_name'], $caminho.$_POST['id'].".".$extensao);
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