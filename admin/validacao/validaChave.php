<?php
	
	function validaChave($str){
	
		$chave = date("d");
		$chave .= date("m");
		$chave .= date("Y");
		$chave .= date("H");
		$chave .= date("i");
		$chave .= date("s");
		$chave .= $str;
		$chave .= session_id();	

		return md5($chave);
	}
?>