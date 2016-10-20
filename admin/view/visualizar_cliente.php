<?php 
    #region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion
    include ("../includes/validacoes-acesso.php");
    LogSistema(
            $_SERVER ['REQUEST_URI'], 
            "Nestá página é possível fazer a visualização das informações dos clientes", 
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
            <h1>Cliente - <a class="btn btn-success" href="cadastro_cliente.php"><i class="fa fa-plus"></i> Adicionar Novo Cliente</a></h1>            
        </div>
        <?php
            /*if(isset($_GET['id'])){
                if(!is_numeric($_GET['id']) || $_GET['id'] < 1)
                    include "../avisos/segmento-nao-encontrado.php";                
            }*/
            
            $filtro_nome        = (isset($_GET['nm_cliente'])) ? trim($_GET['nm_cliente']) : "";
            $filtro_id          = (isset($_GET['id']) ? trim($_GET['id']) : "");
            $filtro_contato     = (isset($_GET['nm_contato']) ? trim($_GET['nm_contato']) : "");
            $filtro_email       = (isset($_GET['ds_email']) ? trim($_GET['ds_email']) : "");
            $filtro_telefone    = (isset($_GET['nr_telefone']) ? trim($_GET['nr_telefone']) : "");

            include ("../classes/paginacao/paginacao.php");
            $paginacao = new Paginacao($conexao, 15, "pagina", "visualizar_cliente.php");
            
            $paginacao->AddTabela("clientes");

            $paginacao->AddCampoTabela("id");
            $paginacao->AddCampoTabela("nm_cliente");
            $paginacao->NumeroPagina($paginacao->GetDePaginacao());                                                                                         

            if($filtro_id != ""){
                $paginacao->AddGet("id", $filtro_id);
                $paginacao->AddCondicao("id", "=", $filtro_id, "");
            }
            if($filtro_nome != ""){
                $paginacao->AddGet("nm_cliente", $filtro_nome);
                $paginacao->AddCondicao("nm_cliente", "like", "%".$filtro_nome."%", "AND");   
            }  
            if($filtro_email != ""){
                $paginacao->AddGet("ds_email", $filtro_email);
                $paginacao->AddCondicao("ds_email", "like", "%".$filtro_email."%", "AND");   
            } 
            if($filtro_contato != ""){
                $paginacao->AddGet("nm_contato", $filtro_contato);
                $paginacao->AddCondicao("nm_contato", "like", "%".$filtro_contato."%", "AND");   
            } 
            if($filtro_telefone != ""){
                $paginacao->AddGet("nr_telefone", $filtro_telefone);
                $paginacao->AddCondicao("nr_telefone", "like", "%".$filtro_telefone."%", "AND");   
            } 
            
            
            $paginacao->GerarRegistros();       
        ?>
        <div class="main">
            <div class="container">
                <!-- LINHA -->
                <div class="row">                   
                    <!--  COLUNA 12 -->         
                    <div class="col-md-12">
                        <!-- ELEMENTO LISTA -->
                        <div class="panel panel-primary">                    
                            <!-- / ELEMENTO TITULO -->
                            <div class="panel-heading">
                                <h4>Filtrar Segmentos</h4>                            
                            </div>
                            <!-- / ELEMENTO TITULO -->
                            <!-- / ELEMENTO CORPO -->
                            <div class="widget-content">
                                <table class="table table-striped table-bordered">
                                    <form id="filtro-segmento" role="form" >                                        
                                        <div class="col-md-2 well">
                                            <label>ID:</label>
                                            <input value="<?php echo $filtro_id; ?>" type="text" id="id" name="id" placeholder="ID do cliente" class="form-control" />
                                        </div> 
                                        
                                        <div class="col-md-6 well">
                                            <label>Nome do Cliente:</label>
                                            <input value="<?php echo "$filtro_nome"; ?>" type="text" id="nm_cliente" name="nm_cliente" placeholder="Nome do cliente" class="form-control" />
                                        </div> 
                                        
                                        <div class="col-md-4 well">
                                            <label>Contato:</label>
                                            <input value="<?php echo "$filtro_contato"; ?>" type="text" id="nm_contato" name="nm_contato" placeholder="Nome do contato" class="form-control" />
                                        </div>  
                                            
                                        <div class="col-md-6 well">
                                            <label>E-mail:</label>
                                            <input value="<?php echo "$filtro_email"; ?>" type="text" id="ds_email" name="ds_email" placeholder="e-mail" class="form-control" />
                                        </div>                                        

                                        <div class="col-md-6 well">
                                            <label>telefone:</label>
                                            <input value="<?php echo $filtro_telefone; ?>" type="text" id="nr_telefone" name="nr_telefone" placeholder="telefone" class="form-control" />
                                        </div>   
                                                                                
                                        <button class="form-control btn btn-default">Filtrar</button>

                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>

                                        <button id="bnt-limpar-filtros" class="form-control btn btn-default">Limpar Filtros</button>

                                    </form> 
                                </table>                                                                                                        
                            </div> 
                            <!-- / ELEMENTO CORPO -->                       
                        </div>
                        <!-- / ELEMENTO LISTA -->   
                    </div> 
                    <!-- / COLUNA 12 -->    
                </div>
                    <!--  COLUNA 12 -->         
                    <div class="col-md-12">                                                                                                             
                        <!-- ELEMENTO LISTA -->
                        <div class="panel panel-primary">                  
                            <!-- / ELEMENTO TITULO -->
                            <div class="panel-heading">
                                <h4>Lista de Segmentos</h4>                            
                            </div>
                            <!-- / ELEMENTO TITULO -->
                            <!-- / ELEMENTO CORPO -->
                            <div class="widget-content">                    
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th class="td-actions"><center>Ações</center></th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php
                                            foreach ($paginacao->Registros() as $key => $value) {
                                        ?>
                                                <td><?php echo strtoupper($value['id'])?></td>
                                                <td><?php echo strtoupper($value['nm_cliente'])?></td>               
                                                <td class="td-actions">
                                                    <center>
                                                    <a rel="<?php echo $value['id'];?>" class="btn btn-xs btn-warning atualizar-cliente tooltips" data-toggle="tooltip" data-placement="top" title="Editar">
                                                        <i class="fa fa-edit"></i>
                                                    </a>                                                    
                                                    <a rel="<?php echo $value['id'];?>" class="btn btn-xs btn-default visualizar-cliente tooltips" data-toggle="tooltip" data-placement="top" title="Visualizar">
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
                                <div class="col-md-12">
                                    <ul class="pagination">
                                        <?php $paginacao->Navegacao(); ?>
                                    </ul>
                                </div>
                                <div class="col-md-12">
                                    <label>
                                        Exibindo: <?php echo $paginacao->NumeroDeInicio(); ?> - <?php echo $paginacao->NumeroDeFinal(); ?> de: <?php echo $paginacao->TotalRegistros(); ?> encontrados
                                    </label>                                    
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
    
    //region limpar filtros segmento
    $("#bnt-limpar-filtros").click(function(){        
        $('#nm_cliente').attr('value','');
        $('#id').attr('value','');
        $('#nm_contato').attr('value','');
        $('#ds_email').attr('value','');
        $('#nr_telefone').attr('value','');
        document.location.href="visualizar_cliente.php";                    
        return false;
    });
    //endregion

    //region visualizar segmento
    $('.visualizar-cliente').click(function() {
        var codigo = parseInt($(this).attr('rel'));
        document.location.href="visualizar_cliente_2.php?id="+codigo;
    });
    //endregion  

    //region atualizar segmento
    $('.atualizar-cliente').click(function() {
        var codigo = parseInt($(this).attr('rel'));
        document.location.href="atualizar_cliente.php?id="+codigo;
    });
    //endregion
    
</script>
<?php include "../includes/loading.php" ?>

