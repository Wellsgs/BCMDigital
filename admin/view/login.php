<?php
	#region Classe que inclui paginas de acordo com o set de arquvio, tendo como extenção a classe de linguagem		
	include "../classes/LINGUA/linguagem.php";
	include "../classes/PAGINA/incluirPagina.php";
	$pg = new Paginas();	
	#endregion
?>
<head>
	<title><?php echo $pg->Texto('login'); ?></title>  		
	<?php include_once "../includes/head.php"; ?>
</head>
<body class="focusedform">		
	<div class="verticalcenter">
		
		<!--img src="../public/img/logotipo-idpvat.jpg" alt="Logo" class="brand"-->
		<div style="text-align:center">
			<h2>Painel de controle</h2>
		</div>
		<div class="panel panel-primary">
			<div class="panel-body">
				<h4 class="text-center" style="margin-bottom: 25px;"><?php echo $pg->Texto('entre-no-sistema'); ?></h4>
				<form id="login-form" action="#" class="form-horizontal" method="POST" style="margin-bottom: 0px !important;">
					<div class="form-group">
						<div class="col-sm-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" class="form-control" name="email" placeholder="<?php echo $pg->Texto('email'); ?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control" name="senha" placeholder="<?php echo $pg->Texto('senha'); ?>">
							</div>
						</div>
					</div>						
				</form>						
			</div>
			<div class="panel-footer">				
				<div class="pull-right">
					<a href="#" class="btn btn-primary" id="entrar"><?php echo $pg->Texto('acessar'); ?></a>
				</div>				
			</div>
		</div>
	</div>	
</body>

<script type='text/javascript' src='../public/js/jqueryui-1.10.3.min.js'></script>
<script type='text/javascript' src='../public/js/bootstrap.min.js'></script>
<script type='text/javascript' src='../public/js/bootbox/bootbox.min.js'></script>
<script type='text/javascript' src='../public/js/alertas.js'></script>

<script>

	$('#entrar').click(function(){
		$.post("login_validacao.php", $("#login-form").serialize(),function(data){		   
		   	if(data == "0")
				alertaSucesso('Acesso concedido com sucesso.', 'Sucesso' ,"inicio.php");
			else if(data== "4")
				alertaErro("Usuário não encontrado","alert");
			else if(data== "5")
				alertaErro("Senha incorreta","alert");
			else
				alertaErro("Erro desconhecido, tente novamente!","alert");			   
		});
	});
	
</script>

<?php include "../includes/loading.php" ?>