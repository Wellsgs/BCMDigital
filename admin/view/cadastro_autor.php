<?php 
    #region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion 
    include ("../includes/validacoes-acesso.php");

    LogSistema(
            $_SERVER ['REQUEST_URI'], 
            "Nestá pagina é possível fazer o cadastro de autores", 
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
            <h1>Cadastro de Autor</h1>            
        </div>
        <div class="main">
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>Cadastro de autor</h4>                            
                            </div>
                            <div class="panel-body collapse in">
                                <div id="example_wrapper" class="dataTables_wrapper" role="grid">
                                    <form id="cadastrar-autor" method="post" enctype="multipart/form-data" role="form">                                       
                                        
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Foto:</label>
                                            <div class="col-md-11">
                                                <input type="file" name="foto_autor" id="foto_autor">                                            
                                            </div>    
                                        </div>
                                        
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Nome:</label>
                                            <div class="col-sm-6">                                                
                                                <input type="text" name="nm_autor" placeholder="Nome do autor" class="form-control required" />
                                            </div>
                                        </div>  
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Segmento:</label>
                                            <div class="col-sm-6">
                                                <select name="id_segmento" class="form-control col-sm-6">
                                                    <option value=""> Escolha um Segmento </option>
                                                <?php $sql = mysql_query("SELECT id, nm_segmento FROM segmentos ORDER BY nm_segmento", $conexao);
                                                    while($result = mysql_fetch_array($sql)){
                                                        echo "<OPTION VALUE='".$result['id']."'>".$result['nm_segmento']."</OPTION>";
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Frase:</label>
                                            <div class="col-sm-6">                                                
                                                <textarea  rows="4" cols="10" name="ds_frase" placeholder="Digite uma frase para o perfil do Autor" class="form-control"/></textarea>
                                            </div>                                               
                                        </div> 
                                        <div class="form-group col-sm-12">                                            
                                            <label class="col-sm-1 control-label"></label>
                                                <div class="col-sm-4">                                                
                                                <input type="text" name="ds_frase_autor" placeholder="Autor da frase" class="form-control " />
                                            </div>
                                        </div> 
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Facebook:</label>
                                            <div class="col-sm-6">                                                
                                                <input type="text" name="ds_link_facebook" placeholder="Link da pagina do Facebook" class="form-control " />
                                            </div>
                                        </div>  
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Twitter:</label>
                                            <div class="col-sm-6">                                                
                                                <input type="text" name="ds_link_twitter" placeholder="Link da pagina do Twitter" class="form-control" />
                                            </div>
                                        </div>  
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Instagram:</label>
                                            <div class="col-sm-6">                                                
                                                <input type="text" name="ds_link_instagram" placeholder="Link da pagina do Instagram" class="form-control" />
                                            </div>
                                        </div>  
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" >Cadastrar</button>
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

//region cadastro segmento
$('#cadastrar-autor').validate();

$("#cadastrar-autor").on('submit', function(e){                                               

    var isvalidate=$("#cadastrar-autor").valid();
    if(isvalidate){
        
        $.ajax({
            url:"../controller/novo-autor.php",
            type: "POST",
            data: new FormData( this ),
            processData: false,
            contentType: false,
            success : function(data){
                //alertaErro(data, "ERRO DATA");                
                if(data == "0")
                    alertaSucesso('Cadastrado com sucesso!', 'Sucesso', '../view/visualizar_autor.php');
                else if (data == "1")
                    alertaErro("Você não tem permissão para executar está ação!", "Erro");                                                     
                else                    
                    alertaErro("Erro desconhecido, tente novamente!", "alert");
            }    
        });        
        
    }

    return false;
});

</script>
<?php include "../includes/loading.php" ?>

