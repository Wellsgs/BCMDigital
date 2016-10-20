<?php
	
	#region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion

	include "../config/conecta_paralelo_2.php";

	function verificaSession($pagina, $co){
		if(!isset($_SESSION['fid']) || !is_numeric($_SESSION['fid']) || $_SESSION['fid'] == "" || $_SESSION['fid'] < 1 )
			return false;	
		
		if (retornoQueryUmaField( "SELECT COUNT(*) AS total FROM permissoes WHERE id_cargo=".$_SESSION['fcargo']." AND pagina=(SELECT id FROM paginas2 WHERE nome_final='".$pagina."' LIMIT 1) LIMIT 1;", $co, "total") < 1)
			return false;
		else
			return true;
	}

	function verificarSessionSemPagina(){
		if(!isset($_SESSION['fid']) || !is_numeric($_SESSION['fid']) || $_SESSION['fid'] == "" || $_SESSION['fid'] < 1 )
			return false;	
		else
			return true;
	}

	include "../controller/log_sistema.php";
?>