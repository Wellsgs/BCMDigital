<?php
	
	//session_start();

	if(
		!isset($_SESSION['fid']) || 
		!is_numeric($_SESSION['fid']) || 
		$_SESSION['fid'] == "" || 
		$_SESSION['fid'] < 1
	)
	{
		header("Location: login.php");
		exit;	
	}


?>