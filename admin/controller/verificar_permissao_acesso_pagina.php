<?php
	$pathName = pathinfo($_SERVER['PHP_SELF']);
	if(
	retornoQueryUmaField("SELECT COUNT(*) AS total FROM permissoes WHERE id_cargo=".$_SESSION['fcargo']." AND pagina=(SELECT id FROM paginas2 WHERE nome_final='".$pathName['basename']."' LIMIT 1) LIMIT 1;", $conexao,"total") < 1 
	&& $pathName['basename'] != "index.php"
	&& $pathName['basename'] != "alterar_senha.php"
	){
		header("Location: ../view/sem-permissao.php");
	}

?>