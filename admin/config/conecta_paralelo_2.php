<?php
//	$conexao = @mysql_connect("108.167.188.70","lemon265_bc","123abc456");
//	mysql_select_db("lemon265_bc");
        
        $conexao = @mysql_connect("localhost","root","root");
	mysql_select_db("lemon265_bc");

	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET character_set_connection=utf8");
	mysql_query("SET character_set_client=utf8");
	mysql_query("SET character_set_results=utf8");
	
	include "retornoQueryUmaField.php";
	include "retornoQueryBolleana.php";
?>