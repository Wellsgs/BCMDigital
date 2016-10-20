<?php
   
   session_start();
   session_unset();
   
   include("../validacao/echoJson.php");     

   #region arrays 
   $flag = 0;


   $meuArray = array(
      'email', 
      'senha'
      );
   #endregion


   #region validação da existencia de todos os valores requeridos
   if(empty($_POST))
      echoJson($flag=1, false);
   
   foreach ($meuArray as $key => $value) {
      
      if(!isset($_POST[$value]) || trim($_POST[$value]) == "")
         echoJson($flag=2, false);
      else
         $_POST[$value] = addslashes(trim($_POST[$value]));
   }
   #endregion

   #region verificação da existem em banco

   include "../config/conecta_paralelo_2.php";
   include("../controller/log_sistema.php"); 

   $query = "SELECT id, nome, senha, cargo, token, token_estabelecimento FROM funcionario WHERE email='".$_POST['email']."' AND flag = 0 LIMIT 1;";
   
   $resultado = mysql_query($query, $conexao);

   if(mysql_errno($conexao) > 0)
      echoJson(mysql_error($conexao), false);

   if(mysql_num_rows($resultado) < 1)
      echoJson($flag=4, false);              
   
   $linha = mysql_fetch_array($resultado);
      
   if($linha['senha'] == $_POST['senha']){
      $_SESSION['fid']                      = $linha['id'];
      $_SESSION['fcargo']                   = $linha['cargo'];
      $_SESSION['fnome']                    = $linha['nome'];
      $_SESSION['ftoken']                   = $linha['token'];
      $_SESSION['ftoken_estabelecimento']   = $linha['token_estabelecimento'];
      $_SESSION['sessao_l']                 = base64_encode($_POST['email']);
      $_SESSION['sessao_s']                 = base64_encode($_POST['senha']);
         
      date_default_timezone_set('America/Sao_Paulo');
      $_SESSION['donoSessao'] = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].date("Y-m-d").$_SESSION['sessao_l'].$_SESSION['sessao_s']);

      $tempolimite = 3600;
      $_SESSION['registro'] = time(); 
      $_SESSION['limite']   = $tempolimite;
   }
   else
      echoJson($flag=5, false);

   LogSistema(
         $_SERVER ['REQUEST_URI'], 
         "Está pagina faz acesso ao sistema", 
         "Acesso liberado",
         $conexao
      );  

   #endregion

   echoJson($flag, false); 
?>