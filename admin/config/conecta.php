<?php

    require('adodb/adodb.inc.php'); //biblioteca necessaria para trabalhar com adodb	
	require('../public/util/funcoes.php');
	
	// CONEX�O ADO COM BANCO DE DADOS MYSQL
	
//	class conexao
//	{
//	      var $tipo_banco    = "mysql";
//		  var $servidor      = "108.167.188.70";
//		  var $usuario       = "lemon265_bc";
//		  var $senha         = "123abc456";
//		  var $banco;       
//	    
//	      function conexao() //metodo construtor
//		  {
//                $this->banco = NewADOConnection($this->tipo_banco);
//				$this->banco->dialect = 3;
//				$this->banco->debug = false;
//				$this->banco->Connect($this->servidor,$this->usuario,$this->senha,"lemon265_bc");
//		  }
//	}
        
        // CONEX�O ADO COM BANCO DE DADOS MYSQL LOCAL
        class conexao
	{
	      var $tipo_banco    = "mysql";
		  var $servidor      = "localhost";
		  var $usuario       = "root";
		  var $senha         = "root";
		  var $banco;       
	    
	      function conexao() //metodo construtor
		  {
                $this->banco = NewADOConnection($this->tipo_banco);
				$this->banco->dialect = 3;
				$this->banco->debug = false;
				$this->banco->Connect($this->servidor,$this->usuario,$this->senha,"lemon265_bc");
		  }
	}
	
	
	// CONEX�O ADO COM BANCO DE DADOS MYSQL
	/*class conexao
	{
	      var $tipo_banco    = "mysql";
		  var $servidor      = "108.167.188.70";
		  var $usuario       = "lemon265_doutor";
		  var $senha         = "meiuh1998";
		  var $banco;       
	    
	      function conexao() //metodo construtor
		  {
                $this->banco = NewADOConnection($this->tipo_banco);				
				$this->banco->dialect = 3;
				$this->banco->debug = false;
				$this->banco->Connect($this->servidor,$this->usuario,$this->senha,"lemon265_doutor1");
				$this->banco->EXECUTE("set names 'utf8'");
		  }
	}*/	

	
	// CONEX�O ADO COM BANCO DE DADOS SQLSERVER
	/*class conexao{
		
	      var $tipo_banco    = "odbc_mssql";
		  var $servidor      = "sql_con";
		  var $usuario       = "root";
		  var $senha         = "root";
		  var $banco;       
	    
	      function conexao() //metodo construtor
		  {
                $this->banco = NewADOConnection($this->tipo_banco);
				$this->banco->dialect = 3;
				$this->banco->debug = false;
				$this->banco->Connect($this->servidor,$this->usuario,$this->senha,"prj_nfe");
		  }
		
	}*/
	

	$con = new conexao();
	
	
	function addEmArrays($array){
		foreach ($array as $key => $value) {
			if(is_array($value))
				$array[$key] = addEmArrays($value);
			else
				$array[$key] = addslashes(trim($value));
		}
		return $array;
	}

	$_REQUEST = addEmArrays($_REQUEST);
	
	/*
	Lembrete:
	---------
	
	* No ODBC criar a conexao com o nome sql_con;
	* No Banco de Dados SQLSERVER criar um usuario root;
	* No IIS na parte de SEGURAN�A/AVAN�ADAS permitir acesso total para usuario IIS_IUSRS;
	* No IIS AUTENTICA��O/AUTENTICA��O ANONIMA HABILITADA/EDITAR colocar o login e senha do administrador do windows;
	
	*/
	
?>