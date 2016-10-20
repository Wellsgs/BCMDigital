<?php
	#region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion

	date_default_timezone_set('America/Sao_Paulo');
	$tokenUser = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].date("Y-m-d").$_SESSION['sessao_l'].$_SESSION['sessao_s']);
 	
	if($_SESSION['donoSessao'] != $tokenUser){
		$para_url = '../view/logoff.php';
		echo '<script>window.location="'.$para_url.'"</script>';
		exit;	    
	}
?>