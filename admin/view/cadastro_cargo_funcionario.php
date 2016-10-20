<?php 
    #region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion 
    include ("../includes/validacoes-acesso.php");
    LogSistema(
            $_SERVER ['REQUEST_URI'], 
            "Nestá pagina é possível fazer o cadastro de cargos de funcionários, alterar sua ordem hierárquica, e deletar", 
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
            <h1>Cadastro de Cargos</h1>            
        </div>
        <div class="main">
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>Dados do novo cargo</h4>                            
                            </div>
                            <div class="panel-body collapse in">
                                <div id="example_wrapper" class="dataTables_wrapper" role="grid">
                                    <form action="#" id="cadastrar-cargo-funcionario" name="cadastrar-cargo-funcionario" method="post" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Nome</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control required" placeholder="Nome do cargo" name="nome">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Descrição</label>
                                            <div class="col-sm-11">
                                                <textarea rows="6" class="form-control required" placeholder="Descrição do cargo" name="descricao"></textarea>
                                            </div>
                                        </div>
                                        <div class="panel-footer">                                        
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="btn-toolbar" style="float:left">
                                                        <button class="btn-primary btn" id="btn_gravar" onClick="$('#formUsuario').submit();">Gravar</button>
                                                    </div>
                                                </div>
                                            </div>            
                                        </div>
                                    </form>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                            <th>Descrição</th>
                                            <th class="td-actions">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $resp = mysql_query("SELECT id, nome, SUBSTRING(descricao, 1, 25), nivel FROM cargo_funcionario ORDER BY nivel", $conexao);
                                            if(mysql_num_rows($resp) > 0)
                                            while ($linha = mysql_fetch_array($resp)) {                                                 
                                        ?>
                                        <tr>
                                            <td><b><?php echo strtoupper($linha[1])?></b></td>
                                            <td><?php echo str_replace("<br />", ", ", $linha[2])?>...</td>
                                            <td class="td-actions">
                                                <center>
                                                    <a rel="<?php echo ($linha[0]);?>" class="btn btn-xs btn-warning editar-cargo tooltips" data-toggle="tooltip" data-placement="top" title="Editar">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="visualizar_cargo.php?id=<?php echo $linha[0] ?>" class="btn btn-xs btn-default visualizar-cargo tooltips" data-toggle="tooltip" data-placement="top" title="Visualizar">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a rel="<?php echo ($linha[0]);?>" class="btn btn-xs btn-danger excluir-cargo tooltips" data-toggle="tooltip" data-placement="top" title="Excluir">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                    <a href="permissoes_cargos.php?id=<?php echo $linha[0] ?>" class="btn btn-xs btn-info permissao-cargo tooltips" data-toggle="tooltip" data-placement="top" title="Permissões">
                                                        <i class="fa fa-star"></i>
                                                    </a>
                                                    <a rel="<?php echo ($linha[3]);?>" class="btn btn-xs btn-success subir-cargo tooltips" data-toggle="tooltip" data-placement="top" title="Subir">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <a rel="<?php echo ($linha[3]);?>" class="btn btn-xs btn-danger descer-cargo tooltips" data-toggle="tooltip" data-placement="top" title="Descer">
                                                        <i class="fa fa-minus"></i>
                                                    </a>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>                      
                                    </tbody>
                                </table>                                
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

$(function () {
    //region cadastro de novo cargo    
    $('#cadastrar-cargo-funcionario').validate();

    $('#btn_gravar').click(function(){
        var isvalidate=$("#cadastrar-cargo-funcionario").valid();
        if(isvalidate){
            $.post("../controller/cadastro-cargos-funcionario.php", $("#cadastrar-cargo-funcionario").serialize(),function(data){                          
                if(data=="0"){                    
                    alertaSucesso('Cadastrado com sucesso!.', 'Sucesso', '../view/cadastro_cargo_funcionario.php');
                }else{                    
                    alertaErro('Erro ao gravar, tente novamento.', 'Erro');
                }                                       
            });
            return false;
        }       
    });  
    //endregion

    //region alterar cargo
    $('.editar-cargo').click(function() {
        var codigo = parseInt($(this).attr('rel'));
        $.ajax(
            {               
                url:"../controller/resgate-cargos-funcionario.php",
                type: "POST",
                data: {"id":codigo},
                success : function(data){
                    data = $.parseJSON(data);
                    if(data.flag == 0){
                        document.location.href="../view/cadastro_cargo_funcionario_alterar.php?nome="+data.nome+"&descricao="+data.descricao+"&id="+codigo;
                    }                       
                }
            }
        );
    });
    //endregion

    //region excluir cargo
    $('.excluir-cargo').click(function() {
        var codigo = parseInt($(this).attr('rel'));
        $.ajax(
            {               
                url:"../controller/deletar-cargos-funcionario.php",
                type: "POST",
                data: {"id":codigo},
                success : function(data){
                    if(data == "0")
                        alertaSucesso('Removido com sucesso!.', 'Sucesso', '../view/cadastro_cargo_funcionario.php');
                    else if (data == "1")
                        alertaErro('Aviso, você não tem permissão para fazer esse tipo de operação.', 'Erro');                        
                    else if (data == "5")
                        alertaErro('Erro ao gravar, tente novamento.', 'Erro');                                       
                }
            }
        );
    });
    //endregion  

    //region subir nivel cargo
    $(".subir-cargo").click(function(){
        var end = parseInt($(this).attr('rel'));
        $.ajax(
            {               
                url:"../controller/subir-nivel-cargo.php",
                type: "POST",
                data: {id:end},
                success : function(data){   
                    if(data == "0")
                        alertaSucesso('Alterado com sucesso!.', 'Sucesso', '../view/cadastro_cargo_funcionario.php');
                    else if (data == "1")
                        alertaErro('Aviso, você não tem permissão para fazer esse tipo de operação.', 'Erro');                        
                    else
                        alertaErro("Ocorreu um erro, tente novamente!", "alert");                   
                }               
            }
        );
    });
    //endregion

    //region descer nivel cargo
    $(".descer-cargo").click(function(){
        var end = parseInt($(this).attr('rel'));
        $.ajax(
            {               
                url:"../controller/descer-nivel-cargo.php",
                type: "POST",
                data: {id:end},
                success : function(data){   
                    if(data == "0")
                        alertaSucesso('Alterado com sucesso!.', 'Sucesso', '../view/cadastro_cargo_funcionario.php');
                    else if (data == "1")
                        alertaErro('Aviso, você não tem permissão para fazer esse tipo de operação.', 'Erro');                        
                    else
                        alertaErro("Ocorreu um erro, tente novamente!", "alert");                   
                }               
            }
        );
    });
    //endregion
        
});

</script>
<?php include "../includes/loading.php" ?>

