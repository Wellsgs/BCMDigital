<?php
	if (!isset($_SESSION)) {
        session_start();
    };

	if(!isset($_SESSION['fid']))
		exit;
	
	if(file_exists("../usuarios/".$_SESSION['fid']."/".$_SESSION['fid'].".jpg")){
		$diretorio = "../usuarios/".$_SESSION['fid']."/".$_SESSION['fid'].".jpg";		
	}else{
		$diretorio = "../usuarios/default_3.jpg";
	}
		
	header('Content-Type: image/jpeg');
	echo file_get_contents($diretorio);
?>