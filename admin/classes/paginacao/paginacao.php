<?php
	/*
	* Aqui poderão ser feitas as leituras e retornos em mysql de paginação
	*/
	class Paginacao
	{	
		# CAMPOS
			
			#<------------------------------------
			# Conexao ao Bando de dados
			private $conexao;			
			#------------------------------------>

			#<------------------------------------
			# Array com os campos da tabela a serem retornados
			private $campostabela = array();			
			private $tabela = array();
			#------------------------------------>

			#<------------------------------------														
			
			
			# Paginação
			private $arrayDeGets = array();
			private $getDePaginacao;
			private $pagina;

			# Ordenação
			private $ordenacao = array();

			# Indices
			private $qtdRetorno;
			private $numeroDeInicio;
			private $numeroPagina;
			private $totalRegistros = 0;

			# Retorno
			private $registros = array();

			# Condições
			private $condicoes = array();

			#------------------------------------>

		# / CAMPOS

		# PROPRIEDADES

			#<------------------------------------
			public function Navegacao(){
				
				if($this->qtdRetorno > 0)
					if($this->TotalRegistros() > 0){
					
						$limite = ceil($this->TotalRegistros() / $this->qtdRetorno);									

						$link = $this->pagina;

						$flag = false;
						foreach ($this->arrayDeGets as $key => $value) {
							if(!$flag){
								$link .= "?".$key."=".$value;
								$flag = true;
							}
							else
								$link .= "&".$key."=".$value;
						}

						if(count($this->arrayDeGets) > 0)
							$link .= "&".$this->getDePaginacao."=";
						else
							$link .= "?".$this->getDePaginacao."=";

						if($this->GetDePaginacao() > 1)
			            	echo '<li><a href="'.$link.'" >&laquo; Primeira</a></li>';						                	

						if(($this->GetDePaginacao()-1) > 1)
							echo '<li><a href="'.$link.($this->GetDePaginacao()-1).'"><</a></li>';

						if(($this->GetDePaginacao()-1) != 0)
							echo '<li><a href="'.$link.($this->GetDePaginacao()-1).'">'.($this->GetDePaginacao()-1).'</a></li>';
				
			       		echo "<li class='active'><a href='javascript:;'>".$this->GetDePaginacao()."</a></li>";			       		

			        	if(($this->GetDePaginacao()+1) <= $limite)
							echo '<li><a href="'.$link.($this->GetDePaginacao()+1).'">'.($this->GetDePaginacao()+1).'</a></li>';
						
						if(($this->GetDePaginacao()+1) < $limite)
							echo '<li><a href="'.$link.($this->GetDePaginacao()+1).'">></a></li>';

			        	if($this->GetDePaginacao() < $limite)					            		
			                echo '<li><a href="'.$link.$limite.'">Ultima &raquo;</a></li>';            	                
					}
			}
			#------------------------------------>

			#<------------------------------------
			public function AddCondicao($campo, $condicao, $valor, $parametro){
				$array_temporario = array('campo' => $campo, 'condicao'=> $condicao, 'valor'=> $valor, "parametro"=>$parametro);
				array_push($this->condicoes ,$array_temporario);				
			}
			public function LimparCondicoes(){
				$this->condicoes= array();
			}
			#------------------------------------>

			#<------------------------------------
			public function AddOrdem($campo, $a){
				$array_temporario = array('campo' => $campo, 'a'=> $a);
				array_push($this->ordenacao, $array_temporario);
			}

			public function LimparOrdem(){
				$this->ordenacao = array();
			}
			#------------------------------------>

			#<------------------------------------
			public function AddGet($chave, $valor){
				$this->arrayDeGets[$chave] = $valor;				
			}
			public function LimparGets(){
				$this->arrayDeGets= array();
			}
			public function GetDePaginacao(){				
				if(!isset($_GET[$this->getDePaginacao]))
					return 1;
				else if(!is_numeric($_GET[$this->getDePaginacao]))
					return 1;
				else
					return round($_GET[$this->getDePaginacao]);
			}
			#------------------------------------>

			#<------------------------------------
			# Retornando numero total de registros do banco
			public function TotalRegistros(){
    			return $this->totalRegistros;						
			}
			# Retorna os registros
			public function Registros(){				
    			return $this->registros;							
			}			
			# Retornar a quantida de registros retornados
			public function QtdRegistrosRetornados(){
				return count($this->registros);
			}				
			#Retorna o numero do inicio da mostragem
			public function NumeroDeInicio(){
				if($this->TotalRegistros() > 0)
					return $this->numeroDeInicio+1;				
				else
					return 0;
			}
			#Retorna o numero do final da mostragem
			public function NumeroDeFinal(){
				if($this->TotalRegistros() > 0)				
					return $this->numeroDeInicio() + $this->QtdRegistrosRetornados()-1;				
				else
					return 0;
			}			
			#------------------------------------>

			#<------------------------------------
			# Informamos a conexao que sera usada para paginacao
			private function ConexaoAoBanco($con){				
    			$this->conexao = $con;				
			}
			#------------------------------------>
			
			#<------------------------------------			
			# Gerando o total de registro que existe
			private function GerarTotalRegistros(){		
				$query = "SELECT COUNT(*) AS Total FROM";

				$contagem = count($this->tabela);

				foreach ($this->tabela as $key => $value) {					
					if($contagem > 1){
						$query .= " ".$value.",";
						$contagem--;
					}
					else
						$query .= " ".$value;
				}

				#region adicionando condiçõe
				$contagem = count($this->condicoes);
				if($contagem > 0){
					$query.=" WHERE";
					foreach ($this->condicoes as $key => $value) {						
						$query.=" ".$value['campo']." ".$value['condicao']." '".$value['valor']."'";

						if($contagem > 1)
							$query.=" ".$value['parametro'];

						$contagem--;
					}
				}
				#endregion								

				$resp  = mysql_query($query, $this->conexao);
				$linha = mysql_fetch_array($resp);

				$this->totalRegistros = $linha['Total'];
			}

			# Gerando o array com os registro de retorno
			public function GerarRegistros(){		
				
				$this->GerarTotalRegistros();

				$query = "SELECT";

				$contagem = count($this->campostabela);
				foreach ($this->campostabela as $key => $value) {
					if($contagem > 1){
						$query .= " ".$value.",";
						$contagem--;
					}
					else
						$query .= " ".$value;
				}

				$query .= " FROM";

				$contagem = count($this->tabela);
				foreach ($this->tabela as $key => $value) {					
					if($contagem > 1){
						$query .= " ".$value.",";
						$contagem--;
					}
					else
						$query .= " ".$value;
				}

				#region adicionando condiçõe
				$contagem = count($this->condicoes);
				if($contagem > 0){
					$query.=" WHERE";
					foreach ($this->condicoes as $key => $value) {						
						$query.=" ".$value['campo']." ".$value['condicao']." '".$value['valor']."'";

						if($contagem > 1)
							$query.=" ".$value['parametro'];

						$contagem--;
					}
				}
				#endregion

				$contagem = count($this->ordenacao);
				if($contagem > 0){
					$query.=" ORDER BY";
					foreach ($this->ordenacao as $key => $value) {												
						if($contagem > 1)
							$query.=" ".$value['campo']." ".$value['a'].",";
						else
							$query.=" ".$value['campo']." ".$value['a'];

						$contagem--;
					}
				}
				#endregion
				
				if($this->qtdRetorno > 0){
					$numero_inicio = $this->numeroPagina * $this->qtdRetorno;	
					$numero_inicio = round($numero_inicio);

					$this->numeroDeInicio = $numero_inicio;

					$query .= " LIMIT ".$numero_inicio.", ".$this->qtdRetorno;
				}							

				$resp = mysql_query($query, $this->conexao) ;
				while ($linha = mysql_fetch_array($resp)) {
					array_push($this->registros, $linha);
				}

			}			
			#------------------------------------>										

			#<------------------------------------
			# Numero da pagina que quer retornar
			public function NumeroPagina($n){
    			$this->numeroPagina = ($n -1);				
			}
			# Adinionar os campos a serem retornados na pesquisa			
			public function AddCampoTabela($str){
    			array_push($this->campostabela, $str);				
			}
			# Remover todos os campos de tabelas que foram adicionados
			public function LimparCamposTabela(){
    			$this->campostabela = array();				
			}
			# Adinionar as tabelas a serem retornados na pesquisa
			public function AddTabela($str){
    			array_push($this->tabela, $str);				
			}
			# Remover todos os campos de tabelas que foram adicionados
			public function LimparTabelas(){
    			$this->tabela = array();				
			}
			#------------------------------------>			

		# / PROPRIEDADES
		
		# METODOS
			
			#<------------------------------------
			# Metodo padrão que exige que a conexao com o banco seja setada
			public function __construct($con, $n, $str, $pg){
				$this->ConexaoAoBanco($con);
				$this->qtdRetorno=$n;
				$this->getDePaginacao = $str;
				$this->pagina = $pg;
			}
			#------------------------------------>						

		# / METODOS
	}
?>