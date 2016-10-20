<?php		
	include("verificar_session_requisicao.php");
	include ("../validacao/timeZoneDefault.php");
	include ("../validacao/echoJson.php");	
                  
	$flag = 0;

	$meu_array = array(
            "nm_autor"
	);
               
	#region verifica session
	if(!verificaSession("cadastro_autor.php", $conexao))
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

	#region efetuando cadastro da segmento
	if(
            !retornoQueryBolleana(
                "INSERT INTO autores (`nm_autor`, `id_segmento`, `ds_frase`, `ds_frase_autor`)".
                "VALUES ('".$_POST['nm_autor']."','".$_POST['id_segmento']."','".$_POST['ds_frase']."','".$_POST['ds_frase_autor']."');"
		, $conexao)
	){
            
            echoJson($flag = 11, false);                
	}
        
        $autor_id = mysql_insert_id($conexao);
	#endregion
        
        #region efetuando cadastro das redes sociais do autor 
        #----[Melhorar]----
        if($_POST['ds_link_facebook'] != ""){
            if(!retornoQueryBolleana(
                        "INSERT INTO rede_social_autor (`id_autor`, `id_rede_social`, `ds_link`)".
                        "VALUES ('".$autor_id."','1','".$_POST['ds_link_facebook']."');"
                        , $conexao)){            
                    echoJson($flag = 11, false);                
                }             
        }
        if($_POST['ds_link_twitter'] != ""){
            if(!retornoQueryBolleana(
                        "INSERT INTO rede_social_autor (`id_autor`, `id_rede_social`, `ds_link`)".
                        "VALUES ('".$autor_id."','2','".$_POST['ds_link_twitter']."');"
                        , $conexao)){            
                    echoJson($flag = 11, false);                
                }             
        }
        if($_POST['ds_link_instagram'] != ""){
            if(!retornoQueryBolleana(
                        "INSERT INTO rede_social_autor (`id_autor`, `id_rede_social`, `ds_link`)".
                        "VALUES ('".$autor_id."','3','".$_POST['ds_link_instagram']."');"
                        , $conexao)){            
                    echoJson($flag = 11, false);                
                }             
        }
        
        #region gravando a imagem do autor
        if(isset($_FILES['foto_autor']['name']) && $_FILES['foto_autor']['name'] != ""){
            $caminho      = "../datafiles/autores/".$autor_id."/";
            if(!is_dir($caminho)){
                    mkdir($caminho, 0777, true);
            }
            $data         = explode(".", $_FILES['foto_autor']['name']);
            $extensao     = $data[1];
            move_uploaded_file($_FILES['foto_autor']['tmp_name'], $caminho.$autor_id.".".$extensao);
        }
	#endregion

	LogSistema(
			$_SERVER ['REQUEST_URI'], 
			"Está pagina faz o cadastro de um novo autor", 
			"Nome do autor = ".$_POST['nm_autor']."",
			$conexao
		);

	echoJson($flag, false);
?>