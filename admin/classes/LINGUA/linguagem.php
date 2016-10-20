<?php	
	/**
	* Classe com linguagens de palavras ultilizadas no sistema
	*/
	class Linguagens
	{
            #CHAVE
                  private $textos = array();
            #END CHAVE
            #FUNÇÕES
      		public function Texto($indice){
      			return $this->textos[$indice];
      		}
            #END FUNÇÕES
            #METODOS
      		function __construct() {
      			$this->textos['nome-sistema'] = 'BC';
             		$this->textos['titulo-cadastro-cliente'] = 'Cadastro de Cliente';
             		$this->textos['direitos-reservados'] = 'Todos os direitos reservados';
             		$this->textos['agradecimento-incatel'] = 'Orgulhosamente desenvolvido pela';
             		$this->textos['empresa-desenvolvedora'] = 'Lemon Labs';
             		$this->textos['site-empresa-desenvolvedora'] = 'http://www.lemonlabs.com.br';
             		$this->textos['link-skype'] = 'humberto.ribeiro.martins?call';
             		$this->textos['email-para-suporte'] = 'humberto@lemonlabs.com.br';
             		$this->textos['telefone-para-suporte'] = '(13) 98160-4447';
             		$this->textos['suporte'] = 'Suporte';
             		$this->textos['configuracao'] = 'Configuração';       		
             		$this->textos['alternar-navegacao'] = 'Alternar Navegação';
             		$this->textos['desculpe'] = 'Desculpe';
                        $this->textos['voltar'] = 'Voltar';
                        $this->textos['descricao-404'] = 'Não encontramos a pagina que você procura';
                        $this->textos['acesso-sistema'] = 'Acesso ao Sistema';
                        $this->textos['descricao-acesso'] = 'Faça o login usando a sua conta registrada';
                        $this->textos['login'] = 'Login';
                        $this->textos['email'] = 'Email';
                        $this->textos['senha'] = 'Senha';
                        $this->textos['acessar'] = 'Acessar';
                        $this->textos['esqueceu-senha'] = 'Esqueceu a senha';
                        $this->textos['cadastre-se'] = 'Cadastre-se';
                        $this->textos['ou'] = 'ou';
                        $this->textos['entre-no-sistema'] = 'Informe seu email e senha';
         		}
            #END METODOS
	}
?>