<?php

    require('conecta.php');
	
	$sql = "select * from tbl_cidade";
	
	$resultado = $con->banco->Execute($sql); 
	
	while(!$resultado->EOF)
	{
	    echo "cidade = " . $resultado->Fields('CID_DESCRICAO')."<br>";	
		$resultado->MoveNext();
	}


?>