<?php 
    #region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion
    include ("../includes/validacoes-acesso.php");
    LogSistema(
            $_SERVER ['REQUEST_URI'], 
            "Nestá página é possível fazer a visualização das informações dos autores", 
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
            <h1>Autor - <a class="btn btn-success" href="cadastro_autor.php"><i class="fa fa-plus"></i> Adicionar Novo Autor</a></h1>            
        </div>
        <?php
            /*if(isset($_GET['id'])){
                if(!is_numeric($_GET['id']) || $_GET['id'] < 1)
                    include "../avisos/segmento-nao-encontrado.php";                
            }*/
            
            $filtro_nome        = (isset($_GET['nm_autor'])) ? trim($_GET['nm_autor']) : "";
            $filtro_id          = (isset($_GET['id']) ? trim($_GET['id']) : "");
            $filtro_segmento     = (isset($_GET['id_segmento']) ? trim($_GET['id_segmento']) : "");
            
            include ("../classes/paginacao/paginacao.php");
            $paginacao = new Paginacao($conexao, 15, "pagina", "visualizar_autor.php");
            
            $paginacao->AddTabela("autores");

            $paginacao->AddCampoTabela("id");
            $paginacao->AddCampoTabela("nm_autor");
            $paginacao->AddCampoTabela("id_segmento");
            
            $paginacao->NumeroPagina($paginacao->GetDePaginacao());                                                                                         

            if($filtro_id != ""){
                $paginacao->AddGet("id", $filtro_id);
                $paginacao->AddCondicao("id", "=", $filtro_id, "");
            }
            if($filtro_nome != ""){
                $paginacao->AddGet("nm_autor", $filtro_nome);
                $paginacao->AddCondicao("nm_autor", "like", "%".$filtro_nome."%", "AND");   
            }  
            if($filtro_segmento != ""){
                $paginacao->AddGet("id_segmento", $filtro_email);
                $paginacao->AddCondicao("id_segmento", "like", "%".$filtro_segmento."%", "AND");   
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
                                            <input value="<?php echo $filtro_id; ?>" type="text" id="id" name="id" placeholder="ID do autor" class="form-control" />
                                        </div> 
                                        
                                        <div class="col-md-6 well">
                                            <label>Nome do Autor:</label>
                                            <input value="<?php echo "$filtro_nome"; ?>" type="text" id="nm_autor" name="nm_autor" placeholder="Nome do autor" class="form-control" />
                                        </div> 
                                                                        
                                        
                                        <div class="col-md-4 well">
                                            <label>Cliente:</label>
                                            <select name="csegmento_id" class="form-control required">
                                                <option value=""> Escolha um Segmento </option>
                                                <?php $sql = mysql_query("SELECT id, nm_segmento FROM segmentos ORDER BY nm_segmento", $conexao);
                                                    while($result = mysql_fetch_array($sql)){
                                                        echo "<OPTION VALUE='".$result['id']."'>".$result['nm_segmento']."</OPTION>";
                                                    }
                                                ?>
                                            </select> 
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
                                                <td><?php echo strtoupper($value['nm_autor'])?></td>               
                                                <td class="td-actions">
                                                    <center>
                                                    <a rel="<?php echo $value['id'];?>" class="btn btn-xs btn-warning atualizar-autor tooltips" data-toggle="tooltip" data-placement="top" title="Editar">
                                                        <i class="fa fa-edit"></i>
                                                    </a>                                                    
                                                    <a rel="<?php echo $value['id'];?>" class="btn btn-xs btn-default visualizar-autor tooltips" data-toggle="tooltip" data-placement="top" title="Visualizar">
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
    
    //region limpar filtros autor
    $("#bnt-limpar-filtros").click(function(){        
        $('#nm_autor').attr('value','');
        $('#id').attr('value','');
        $('#id_segmento').attr('value','');
        document.location.href="visualizar_autor.php";                    
        return false;
    });
    //endregion

    //region visualizar segmento
    $('.visualizar-autor').click(function() {
        var codigo = parseInt($(this).attr('rel'));
        document.location.href="visualizar_autor_2.php?id="+codigo;
    });
    //endregion  

    //region atualizar segmento
    $('.atualizar-autor').click(function() {
        var codigo = parseInt($(this).attr('rel'));
        document.location.href="atualizar_autor.php?id="+codigo;
    });
    //endregion
    
</script>
<?php include "../includes/loading.php" ?>

