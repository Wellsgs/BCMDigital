<?php	
	/*
		* Está classe inclui as paginas requeridas pelo parametros são pré dispostos pela url amigavel
	*/
	class Paginas extends Linguagens
	{	
		#CHAVE
			private $arquivo;
		#END CHAVE
		#FUNÇÕES
			#region Setando o arquivo que vai ser incluido como pagina
			public function SetArquivo($a){
				$this->arquivo=$a;			
			}
			#endregion
			#region Incluindo a pagina, e passando como parametro a classe que já foi instanciada na pagina pai
			public function incluirPagina($pg, $root){
				if(file_exists($this->arquivo))
					include_once $this->arquivo;
				else
					include_once "primeira-camada/404.php";
			}
			#endregion
			#region Incluindo a pagina para usuarios não logados
			public function incluirPaginaNaoLogado($pg, $root){
				if(file_exists($this->arquivo))
					include_once $this->arquivo;
				else
					include_once "nao-logado/login.php";
			}
			#endregion
		#END FUNÇÕES
	}	
?>