<?php 
    #region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion 
    include ("../includes/validacoes-acesso.php"); 

    LogSistema(
            $_SERVER ['REQUEST_URI'], 
            "Nestá pagina é possível fazer o cadastro de anuncio", 
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
            <h1>Cadastro de Anúncio</h1>            
        </div>
        <div class="main">
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>Cadastro de Anúncio</h4>                            
                            </div>
                            <div class="panel-body collapse in">
                                <div id="example_wrapper" class="dataTables_wrapper" role="grid">
                                    <form id="cadastrar-anuncio" method="post" role="form" class="col-md-12" enctype="multipart/form-data">
                                    
                                        <div class="col-md-12">
                                            <label>Nome da Empresa:</label>
                                            <input type="text" name="nm_empresa" placeholder="Nome da Empresa" class="form-control required" />
                                        </div>
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-12">
                                            <label>Cliente:</label>
                                            <select name="cliente_id" class="form-control required">
                                                <option value=""> Escolha um cliente </option>
                                                <?php $sql = mysql_query("SELECT id, nm_cliente FROM clientes ORDER BY nm_cliente", $conexao);
                                                    while($result = mysql_fetch_array($sql)){
                                                        echo "<OPTION VALUE='".$result['id']."'>".$result['nm_cliente']."</OPTION>";
                                                    }
                                                ?>
                                            </select> 
                                        </div>
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-12">
                                            <label>Data de Início:</label>
                                            <input type="text" name="dt_inicio" placeholder="Data de Início" class="form-control required data" />
                                        </div> 
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-12">
                                            <label>Data de Expiração:</label>
                                            <input type="text" name="dt_expiracao" placeholder="Data de Expiração" class="form-control required data" />
                                        </div> 
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-12">
                                            <label>Link (sem http://):</label>
                                            <input type="text" name="ds_link" placeholder="Link (sem http://)" class="form-control required" />
                                        </div> 
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        
                                        <div class="checkbox-inline col-md-12">
                                          Exclusivo na Home?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="ic_home" value="sim">Sim</label>
                                        </div>               
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-12">
                                            <label>Segmento:</label>
                                            <select name="segmento_id" class="form-control">
                                                <option value=""> Escolha um segmento </option>
                                                <?php $sql = mysql_query("SELECT id, nm_segmento FROM segmentos ORDER BY nm_segmento", $conexao);
                                                    while($result = mysql_fetch_array($sql)){
                                                        echo "<OPTION VALUE='".$result['id']."'>".$result['nm_segmento']."</OPTION>";
                                                    }
                                                ?>
                                            </select> 
                                        </div>    
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-12">
                                            <label>Tipo:</label>
                                            <select name="tipo_id" class="form-control required">
                                                <option value=""> Escolha um tipo </option>
                                                <?php $sql = mysql_query("SELECT id, nm_tipo FROM tipos ORDER BY nm_tipo", $conexao);
                                                    while($result = mysql_fetch_array($sql)){
                                                        echo "<OPTION VALUE='".$result['id']."'>".$result['nm_tipo']."</OPTION>";
                                                    }
                                                ?>
                                            </select> 
                                        </div>    
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-12">
                                            <label>Foto Ilustrativa:</label>
                                            <input type="file" class="required" name="foto_ilustrativa" id="foto_ilustrativa">                                            
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

$(".data").mask("99/99/9999");

//region cadastro anuncio
$('#cadastrar-anuncio').validate();

$("#cadastrar-anuncio").on('submit', function(e){                                               

    var isvalidate=$("#cadastrar-anuncio").valid();
    if(isvalidate){
        
        $.ajax({
            url:"../controller/novo-anuncio.php",
            type: "POST",
            data: new FormData( this ),
            processData: false,
            contentType: false,
            success : function(data){
                if(data == "0")
                    alertaSucesso('Cadastrado com sucesso!', 'Sucesso', '../view/visualizar_anuncios.php');
                else if (data == "1")
                    alertaErro("Você não tem permissão para executar está ação!", "Erro");                                                     
                else
                    alertaErro("Erro desconhecido, tente novamente!", "alert");
            }    
        });        
        
    }

    return false;
});
//endregion

</script>
<?php include "../includes/loading.php" ?>

