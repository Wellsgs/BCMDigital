<?php	
	require_once "admin/config/conecta_paralelo_2.php";
	require_once "admin/public/util/funcoes.php";

	$tipo = base64_decode($_GET['t']);

	//se o tipo for ultima noticia
	if ($tipo == 'un') {
		#region efetuando cadastro da ultimas noticias
		if(
			!retornoQueryBolleana(
				"INSERT INTO registro_ultimas_noticias (`ultima_id`,data_cadastro) VALUES (".base64_decode($_GET['i']).",'".date('Y-m-d H:i:s')."');"
				, $conexao)
		){
			//echoJson($flag = 11, false);
		}
		#endregion
		
		header('Location: http://'.base64_decode($_GET['link']));
	
	//se o tipo for banner tarja
	}elseif ($tipo == 'bt') {
		#region efetuando cadastro do banner tarja
		if(
			!retornoQueryBolleana(
				"INSERT INTO registro_banner_tarja (`banner_id`,data_cadastro) VALUES (".base64_decode($_GET['i']).",'".date('Y-m-d H:i:s')."');"
				, $conexao)
		){
			//echoJson($flag = 11, false);
		}
		#endregion
		
		header('Location: http://'.base64_decode($_GET['link']));

	//se o tipo for banner fixo
	}elseif ($tipo == 'bf') {
		#region efetuando cadastro do banner tarja
		if(
			!retornoQueryBolleana(
				"INSERT INTO registro_banner_fixo (`banner_id`,data_cadastro) VALUES (".base64_decode($_GET['i']).",'".date('Y-m-d H:i:s')."');"
				, $conexao)
		){
			//echoJson($flag = 11, false);
		}
		#endregion

		header('Location: http://'.base64_decode($_GET['link']));
	}
        
        if ($tipo == 'ar') {
		#region efetuando cadastro do banner tarja
		if(
			!retornoQueryBolleana(
                                "UPDATE artigos SET nr_visualizacoes = nr_visualizacoes + 1 WHERE id = ".base64_decode($_GET['idArtigo'])				
				, $conexao)
		){
			//echoJson($flag = 11, false);
		}
		#endregion
		header('Location: index.php?page=artigo&id='.base64_decode($_GET['idArtigo']));
	}

	
?>