<?php
	function echoJson($str, $bollean){
		
		echo json_encode($str);

		if(!$bollean)
			exit;
		
	}
?>