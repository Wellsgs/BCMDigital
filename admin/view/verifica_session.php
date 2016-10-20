<?php
	#region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion

	$registro = $_SESSION['registro'];
	$limite   = $_SESSION['limite'];
	
	if($registro){// verifica se a session  registro esta ativa
		$segundos = time()- $registro;
	}
	// fim da verificação da session registro

	/* verifica o tempo de inatividade 
	se ele tiver ficado mais de 900 segundos sem atividade ele destroi a session
	se não ele renova o tempo e ai é contado mais 900 segundos*/
	if($segundos>$limite){
		$para_url = '../view/logoff.php';
		echo '<script>window.location="'.$para_url.'"</script>';
		exit;
	}else{
		$_SESSION['registro'] = time();
	}
	
	if(!$_SESSION['fid']){		
		$para_url = '../view/logoff.php';
		echo '<script>window.location="'.$para_url.'"</script>';
		exit;
	}
?>
