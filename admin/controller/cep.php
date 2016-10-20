<?php			
	include("verificar_session_requisicao.php");
	include "../validacao/echoJson.php";
	
	$meuArray = array (
		'flag'=> false,	
		'endereco' =>"",
		'bairro' =>"",
		'cidade' => "",
		'estado' =>""	
	);	
	
	if(!verificarSessionSemPagina())
		echoJson($meuArray, false);

	if(!isset($_GET['cep']))
		 echoJson($meuArray, false);

	$_GET['cep'] = str_replace("-", "", $_GET['cep']);

	if(strlen($_GET['cep']) != 8 || !is_numeric($_GET['cep']))
		 echoJson($meuArray, false);

	$_GET['cep'] = addslashes(trim($_GET['cep']));					
	
	$resultado = mysql_query("SELECT nome, id_uf, id_cidade, id_bairro FROM endereco WHERE cep = '".$_GET['cep']."' LIMIT 1;", $conexao);

	if(mysql_errno($conexao) > 0)
		echoJson($meuArray, false);

	$registro = mysql_fetch_array($resultado);

	$meuArray['endereco'] = $registro['nome'];
	$meuArray['bairro'] = $registro['id_bairro'];
	$meuArray['cidade'] = $registro['id_cidade'];
	$meuArray['estado'] = $registro['id_uf'];	
	
	$meuArray['bairro'] = retornoQueryUmaField("SELECT nome FROM bairro WHERE id_bairro=".$meuArray['bairro']." LIMIT 1;", $conexao, "nome");
	$meuArray['cidade'] = retornoQueryUmaField("SELECT nome FROM cidade WHERE id_cidade=".$meuArray['cidade']." LIMIT 1;", $conexao, "nome");
	$meuArray['estado'] = retornoQueryUmaField("SELECT nome FROM estado WHERE id_uf='".$meuArray['estado']."' LIMIT 1;", $conexao, "nome");

	$meuArray['flag'] = true;

	LogSistema(
			$_SERVER ['REQUEST_URI'], 
			"Está retorna o endereço baseado no cep solicitado", 
			"CEP solicitado = ".$_GET['cep'],
			$conexao
		);

	echoJson($meuArray, false);
			
?>