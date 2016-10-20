<?php
	function validaTelefone($str){
		if(!is_numeric($str) || $str <= 0 || (strlen($str) < 10 || strlen($str) > 11))
			return false;
		else
			return true;
	}
?>