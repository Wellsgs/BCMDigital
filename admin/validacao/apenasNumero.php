<?php
	function apenasNumero($str){
		$str = str_replace("-","", $str);
		$str = str_replace("/","", $str);
		$str = str_replace(".","", $str);
		$str = str_replace("(","", $str);
		$str = str_replace(")","", $str);
		$str = str_replace("_","", $str);
		$str = str_replace(" ","", $str);

		return $str;
	}
?>