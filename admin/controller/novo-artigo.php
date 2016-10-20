<?php		
	include("verificar_session_requisicao.php");
	include ("../validacao/timeZoneDefault.php");
	include ("../validacao/echoJson.php");	
        include ("../public/util/funcoes.php");

	$flag = 0;
                
	$meu_array = array(
            "ds_titulo",
            "dt_artigo",
            "segmento_id",
            "autor_id"
	);
       
	
	#region verifica session
	if(!verificaSession("cadastro_artigo.php", $conexao))
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
	

        $_POST['dt_artigo']    = ConverteData($_POST['dt_artigo']);        

	#region efetuando cadastro da segmento
	if(	!retornoQueryBolleana(
			"INSERT INTO artigos (`segmento_id`, `ds_titulo`, `dt_artigo`, `autor_id`, `ds_artigo`)". 
                                    "VALUES ('".$_POST['segmento_id']."','".$_POST['ds_titulo']."','".$_POST['dt_artigo']."','".$_POST['autor_id']."','".$_POST['ds_artigo']."');"
			, $conexao)
	){
		echoJson($flag = 11, false);
                
	}
	
	#endregion

	#region gravando a imagem do artigo        
        if(isset($_FILES['foto_ilustrativa']['name']) && $_FILES['foto_ilustrativa']['name'] != ""){
            $artigo_id = mysql_insert_id($conexao);
            $caminho      = "../datafiles/artigos/".$artigo_id."/";
            if(!is_dir($caminho)){
                    mkdir($caminho, 0777, true);
            }
            $data         = explode(".", $_FILES['foto_ilustrativa']['name']);
            $extensao     = $data[1];
            move_uploaded_file($_FILES['foto_ilustrativa']['tmp_name'], $caminho.$artigo_id.".".$extensao);
            #endregion
        }else{
            echoJson($flag , false);
        }
	#endregion
        
	

	LogSistema(
			$_SERVER ['REQUEST_URI'], 
			"Está pagina faz o cadastro de um novo artigo", 
			"Nome do rtigo = ".$_POST['ds_titulo']."",
			$conexao
		);

	echoJson($flag, false);
?>