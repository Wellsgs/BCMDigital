<?php
	function retornoQueryUmaField($str, $con, $field){
		
		$resultado = mysql_query($str, $con);
		
		if(mysql_errno() > 0)
			return "-erro-de-query-";
		
		$registro = mysql_fetch_array($resultado);
		
		return $registro[$field];
	}
?>