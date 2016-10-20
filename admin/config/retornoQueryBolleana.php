<?php
	function retornoQueryBolleana($str, $con){
            //print_r($str);
		$resultado = mysql_query($str, $con);
		
		if(mysql_errno() > 0)
			return false;	
		else
			return true;
	}
?>