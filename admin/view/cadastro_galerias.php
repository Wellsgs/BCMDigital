<?php 
    #region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion 
    include ("../includes/validacoes-acesso.php"); 

    LogSistema(
            $_SERVER ['REQUEST_URI'], 
            "Nestá pagina é possível fazer o cadastro de galeria", 
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
            <h1>Cadastro de Galeria</h1>            
        </div>
        <div class="main">
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>Cadastro de galeria</h4>                            
                            </div>
                            <div class="panel-body collapse in">
                                <div id="example_wrapper" class="dataTables_wrapper" role="grid">
                                    <form id="cadastrar-galerias" role="form" class="col-md-12">
                                    
                                        <div class="col-md-12">
                                            <label>Nome do galeria:</label>
                                            <input type="text" name="nm_galeria" placeholder="Nome da galeria" class="form-control required" />
                                        </div>                                                                        
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                                        </div>
                
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

//region cadastro galeria
$('#cadastrar-galerias').validate();

$("#cadastrar-galerias button").click(function(){                                                 

    var isvalidate=$("#cadastrar-galerias").valid();
    if(isvalidate){
        $.ajax(
            {               
                type:"POST",
                url:"../controller/nova-galeria.php",
                data:$("#cadastrar-galerias").serialize(),
                success : function(data){
                    if(data == "0")
                        alertaSucesso('Cadastrado com sucesso!', 'Sucesso', '../view/visualizar_galerias.php');
                    else if (data == "1")
                        alertaErro("Você não tem permissão para executar está ação!", "Erro");

                    else if (data == "9")
                        alertaErro("Já existe uma galeria com este nome!", "Erro");                                                     
                    else
                        alertaErro("Erro desconhecido, tente novamente!", "alert");
                }               
            }
        );        
        
    }

    return false;
});
//endregion

</script>
<?php include "../includes/loading.php" ?>

