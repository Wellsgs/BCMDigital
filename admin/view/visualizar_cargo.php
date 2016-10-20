<?php 
    #region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion
    include ("../includes/validacoes-acesso.php");
    LogSistema(
            $_SERVER ['REQUEST_URI'], 
            "Nestá pagina é possível visualizar a descrição do cargo selecionado", 
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
            <h1>Visualizar Cargos</h1>            
        </div>
        <?php
            if(isset($_REQUEST['id'])){
                if(!is_numeric($_REQUEST['id']) || $_REQUEST['id'] < 1)
                    include "../avisos/cargo-nao-encontrado.php"; 
                //else
                    //include "../visualizacoes/visualizar-cargo.php";                                         
            }
        ?>
        <div class="main">
            <div class="container">
                <div class="row">
                    <!--  COLUNA 12 -->         
                    <div class="col-md-12">                                                                                                             
                        <!-- ELEMENTO LISTA -->
                        <div class="panel panel-primary">                  
                            <!-- / ELEMENTO TITULO -->
                            <div class="panel-heading">
                                <h4>Lista de cargos</h4>                            
                            </div>
                            <!-- / ELEMENTO TITULO -->
                            <!-- / ELEMENTO CORPO -->
                            <div class="widget-content">                    
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>                                           
                                            <th><center>Nível</center></th>
                                            <th class="td-actions"><center>Ações</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $resp = mysql_query("SELECT id, nome, nivel FROM cargo_funcionario ORDER BY nivel", $conexao);
                                            if(mysql_num_rows($resp) > 0)
                                                while ($linha= mysql_fetch_array($resp)) {                                                  
                                        ?>
                                        <tr>
                                            <td><code><?php echo strtoupper($linha['nome'])?></code></td>
                                            <td><center><?php echo strtoupper($linha['nivel'])?></center></td>
                                            <td class="td-actions">
                                                <center>
                                                    <a rel="<?php echo $linha['id'];?>" class="btn btn-xs btn-success visualizar-cargo tooltips" data-toggle="tooltip" data-placement="top" title="Visualizar">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </center>                                                   
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>                      
                                    </tbody>
                                </table> 
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

<script>

//region alterar cargo
    $('.visualizar-cargo').click(function() {
        var codigo = parseInt($(this).attr('rel'));
        document.location.href="visualizar_cargo_2.php?id="+codigo;
    });
    //endregion

</script>
<?php include "../includes/loading.php" ?>

