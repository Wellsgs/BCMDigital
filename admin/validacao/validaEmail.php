<?php
	function validaEmail($str){		
		
		if(strlen($str) < 5)
			return false;
		
		if (strpos($str,'@') <= 3 || strpos($str, '.') < 1)	
			return false;
		else
			return true;
	}
?>