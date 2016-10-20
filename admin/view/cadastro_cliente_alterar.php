<?php 
    #region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion
    include ("../includes/validacoes-acesso.php");
    LogSistema(
            $_SERVER ['REQUEST_URI'], 
            "Nestá pagina é possível fazer alteração dos dados de clientes", 
            "",
            $conexao
        );
?>
<?php include "header.php" ?>

<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li class='active'><a href="../view/inicio.php">Início</a></li>
            </ol>
            <h1>Alteração de cliente</h1>            
        </div>
        <div class="main">
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>Alterar cargo</h4>                            
                            </div>
                            <div class="panel-body collapse in">
                                <div id="example_wrapper" class="dataTables_wrapper" role="grid">
                                    <form action="#" id="alterar-cliente" name="cadastrar-cliente" method="post" class="form-horizontal">
                                        
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Nome</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control required" placeholder="Nome do cliente" name="nome">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">E-mail</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control required" placeholder="e-mail do cliente" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Contato</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control required" placeholder="nome do contato" name="contato">
                                            </div>
                                            <label class="col-sm-1 control-label">Telefone</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control required" placeholder="Telefone do cliente" name="telefone">
                                            </div>
                                        </div> 
                                        
                                        
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Nome</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control required" placeholder="Nome " name="nome" value="<?php echo $_REQUEST['nome'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Descrição</label>
                                            <div class="col-sm-11">
                                                <textarea rows="6" class="form-control required" placeholder="Descrição do cargo" name="descricao"><?php echo $_REQUEST['descricao'];?></textarea>
                                            </div>
                                        </div>
                                        <div class="panel-footer">                                        
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="btn-toolbar" style="float:left">
                                                        <button class="btn-primary btn" id="btn_alterar">Alterar</button>
                                                    </div>
                                                    <div class="btn-toolbar" style="float:right">
                                                        <a href="cadastro_cargo_funcionario.php" class="btn-default btn">Voltar</a>
                                                    </div>
                                                </div>
                                            </div>            
                                        </div>
                                        <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'];?>">
                                    </form>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container -->
        </div>
    </div> <!--wrap -->
</div> <!-- page-content -->

<?php include "footer.php" ?>
<link href="../public/css/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">

<script type='text/javascript' src='../view/assets/js/jquery-1.10.2.min.js'></script> 
<script type='text/javascript' src='../view/assets/js/jqueryui-1.10.3.min.js'></script> 
<script type='text/javascript' src='../view/assets/js/bootstrap.min.js'></script> 
<script type='text/javascript' src='../view/assets/js/enquire.js'></script> 
<script type='text/javascript' src='../view/assets/js/jquery.cookie.js'></script> 
<script type='text/javascript' src='../view/assets/js/jquery.nicescroll.min.js'></script> 
<script type='text/javascript' src='../view/assets/plugins/codeprettifier/prettify.js'></script> 
<script type='text/javascript' src='../view/assets/plugins/easypiechart/jquery.easypiechart.min.js'></script> 
<script type='text/javascript' src='../view/assets/plugins/sparklines/jquery.sparklines.min.js'></script> 
<script type='text/javascript' src='../view/assets/plugins/form-toggle/toggle.min.js'></script> 
<script type='text/javascript' src='../view/assets/js/placeholdr.js'></script> 
<script type='text/javascript' src='../view/assets/js/application.js'></script> 
<script type='text/javascript' src='../view/assets/demo/demo.js'></script> 

<script src="../public/js/jquery.maskedinput.js"></script>
<script src="../public/js/jquery.validate.js"></script>
<script type='text/javascript' src='../public/js/bootbox/bootbox.min.js'></script>
<script type='text/javascript' src='../public/js/alertas.js'></script>

<script>

$(function () {
    //region cadastro de novo cargo    
    $('#alterar-cliente').validate();

    $("#btn_alterar").click(function(){
        
        var isvalidate=$("#alterar-cliente").valid();
        if(isvalidate){                
            $.ajax(
                {               
                    url:"../controller/atualizar-cargos-funcionario.php",
                    type: "POST",
                    data: $("#alterar-cliente").serializeArray(),
                    success : function(data){   
                        if(data == "0")
                            alertaSucesso('Cadastrado com sucesso!.', 'Sucesso', '../view/cadastro_cliente.php');
                        else if (data == "1")
                            alertaErro('Você não tem permissão para fazer esse tipo de operação.', 'Erro');
                        else
                            alertaErro('Erro ao gravar, tente novamento.', 'Erro');
                    }               
                }
            );
        }    
        return false;   
        });
    //endregion        
});

</script>
<?php include "../includes/loading.php" ?>

