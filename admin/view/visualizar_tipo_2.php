<?php 
    #region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion
    include ("../includes/validacoes-acesso.php");
    LogSistema(
            $_SERVER ['REQUEST_URI'], 
            "Nestá página é possível fazer a visualização das informações do tipo selecionado", 
            "",
            $conexao
        );

    $flag=-1;
    if(isset($_GET['id'])){
        if(!is_numeric($_GET['id']) || $_GET['id'] < 1)
            $flag=0;        
        else{
            
            $flag=1;
            
            $resp = mysql_query("SELECT id, nm_tipo FROM tipos WHERE id=".$_GET['id']." ORDER BY nm_tipo LIMIT 1;", $conexao);
            
            if(mysql_num_rows($resp) < 1)
                include "../avisos/tipo-nao-encontrado.php";

            $linha = mysql_fetch_array($resp); 
                   
        }
    }
?>
<?php include "header.php" ?>

<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li class='active'><a href="../view/inicio.php">Início</a></li>
            </ol>
            <h1>Visualizar Detalhes do Tipo</h1>            
        </div>
        <div class="main">
            <div class="container">
                <div class="row">
                    <!--  COLUNA 12 -->         
                    <div class="col-md-12">                                                                                                             
                        <!-- ELEMENTO LISTA -->
                        <div class="panel panel-primary">                  
                            <!-- / ELEMENTO TITULO -->
                            <div class="panel-heading">
                                <h4>Tipo: <?php echo strtoupper($linha['nm_tipo'])?></h4>                            
                            </div>
                            <!-- / ELEMENTO TITULO -->
                            <!-- / ELEMENTO CORPO -->
                            <div class="widget-content">                    
                                <div class="col-md-12">
                                    &nbsp;
                                </div>                                                   
                                <div class="col-md-6">
                                    <b>ID:</b><br />
                                    <?php echo $linha['id'];?>                          
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <b>Nome do Tipo:</b><br />
                                    <?php echo $linha['nm_tipo'];?>
                                    <hr>
                                </div> 
                                <div class="col-md-12">
                                    &nbsp;
                                </div>
                                <div class="panel-footer">                                        
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="btn-toolbar" style="float:left">
                                                        <button class="btn-default btn" onclick="window.history.back()">Voltar</button>
                                                    </div>
                                                </div>
                                            </div>            
                                        </div>                               
                                    </div> 
                                    <!-- / ELEMENTO CORPO -->                       
                                </div>
                                <!-- / ELEMENTO LISTA -->   
                    </div> 
                    <!-- / COLUNA 12 -->    
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

<?php include "../includes/loading.php" ?>

