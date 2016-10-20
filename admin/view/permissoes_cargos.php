<?php 
    #region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion
    include ("../includes/validacoes-acesso.php");
    LogSistema(
            $_SERVER ['REQUEST_URI'], 
            "Nestá pagina é dada as permissão de acesso para o cargo selecionado", 
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
            <h1>Alteração de Cargos</h1>            
        </div>
        <?php 
            if(!isset($_REQUEST['id']))
                include "../avisos/cargo-nao-encontrado.php";
            
            if(!is_numeric($_REQUEST['id']))
                include "../avisos/cargo-nao-encontrado.php";

            $resp = mysql_query("SELECT id, nome FROM cargo_funcionario WHERE id=".$_REQUEST['id']." LIMIT 1;", $conexao);

            if(mysql_num_rows($resp) < 1)
                include "../avisos/cargo-nao-encontrado.php";

            $linha = mysql_fetch_array($resp);
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
                                            <th class="td-actions">Acesso</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $resp = mysql_query("SELECT id, nome FROM paginas2 WHER ORDER BY nome", $conexao);
                                            if(mysql_num_rows($resp) > 0)
                                                while ($linha2= mysql_fetch_array($resp)) {                                                 
                                        ?>
                                        <tr>
                                            <td><a href="javascript:;" onclick="detalhesPagina(<?php echo $linha2['id'] ?>)"><code><?php echo strtoupper($linha2['nome'])?></code></a></td>
                                            <td class="td-actions">
                                                <center>
                                                    <input

                                                        <?php                                                               
                                                            if(retornoQueryUmaField("SELECT COUNT(*) AS total FROM permissoes WHERE id_cargo=".$linha['id']." AND pagina=".$linha2['id']." LIMIT 1;", $conexao, "total") > 0) 
                                                                echo "checked";
                                                        ?>

                                                     class="checa-pagina" endpag="<?php echo $linha2['id']?>" endcargo="<?php echo $linha['id']?>"  type="checkbox" />
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

function detalhesPagina(id){
    $.ajax(
        {
            url:"../controller/resgate-descricao-paginas.php",
            type:"POST",
            data:{"id":id},
            success: function(data){
                data = $.parseJSON(data);
                if(data.flag != 0)
                    alertaErro("Ocorreu um erro, tente novamente", "alert");
                else
                    alertaSucesso(data.descricao, 'Sucesso', 'javascript:;');
            }
        }
    );
}

$(".checa-pagina").click(function(){
    var arquivo;

    if($(this).is(':checked'))
        arquivo = "ativar-pagina.php";
    else
        arquivo = "desativar-pagina.php";

    $.ajax(
        {
            url:"../controller/"+arquivo,
            type: "POST",
            data:{
                    "endpag":$(this).attr("endpag"),
                    "endcargo":$(this).attr("endcargo")
                },
            success: function(data){
            }
        }
    );

});


</script>
<?php include "../includes/loading.php" ?>

