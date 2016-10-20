<?php
	function LogSistema($pagina, $descricao_pagina, $descricao_acao, $conexao){
		$query = "INSERT INTO log 
						(`pagina`, `descricao_pagina`, `id_funcionario`, `nome_funcionario`, `descricao_acao`, `data_acao`) 
					VALUES 
						('".$pagina."', '".$descricao_pagina."', '".$_SESSION['fid']."', '".$_SESSION['fnome']."', '".$descricao_acao."', '".date("Y-m-d H:i:s")."')";

		mysql_query($query, $conexao);					
	}
?>