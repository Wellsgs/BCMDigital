<?php
	function validaData($str){
		
		$dia = date('d');
		$mes = date('m');
		$ano = date('Y');

		$str = explode("/", $str);

		if($str[0] > 31 || $str[0] < 1)
			return false;

		if($str[1] > 12 || $str[1] < 1)
			return false;

		if($str[2] > $ano || $str[2] < ($ano-100))
			return false;
	
		if($str[1] > $mes && $str[2] >= $ano)
			return false;

		if($str[0] > $dia && $str[1] >= $mes && $str[2] > $ano)
			return false;

		return true;
	}

	function transformaData($str){
		
		$str = explode("/", $str);
		return $str[2]."-".$str[1]."-".$str[0];
		
	}
?>