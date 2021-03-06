<?php 
    #region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion 
    include ("../includes/validacoes-acesso.php"); 

    LogSistema(
            $_SERVER ['REQUEST_URI'], 
            "Nestá pagina é possível fazer a atualização de um autor", 
            "",
            $conexao
        );
    
    $flag= true;
    if(!isset($_GET['id']) || !is_numeric($_GET['id']))
        $flag = false;
    
    if($flag){
         $sql = "SELECT * FROM artigos ".
                "WHERE id =".$_GET['id'].";";
        
        $resp = mysql_query($sql,$conexao);
        
        if(mysql_num_rows($resp) < 1)
            include "../avisos/artigo-nao-encontrado.php";        

        $linha = mysql_fetch_array($resp);
                      
        include "../controller/verifica_nivel_de_acesso.php";
        include ("../public/util/funcoes.php");

    }
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
        <?php 
            if(!$flag)
                include "../avisos/autor-nao-encontrado.php";
        ?>
        <div class="main">
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>Alterar dados do artigo: <?php echo strtoupper($linha['ds_titulo'])?></h4>                            
                            </div>
                            <div class="panel-body collapse in">
                                <div id="example_wrapper" class="dataTables_wrapper" role="grid">
                                    <form id="atualizar-artigo" method="post" enctype="multipart/form-data" role="form">                                       
                                        
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Imagem:</label>                                            
                                            <div class="col-md-11">
                                                <?php    
                                                    $caminho = "../datafiles/artigos/".$_GET['id'].""; 
                                                    if(!is_dir($caminho)){
                                                        $arquivo = "../datafiles/artigos/noImage.png";
                                                    }else{                                                        
                                                        $arquivo = PegaImagemPasta($caminho); 
                                                    }
                                                ?>
                                                <img  src="<?php echo $arquivo?>" height="300px" width="500px" class="img-rounded"> 
                                                <input type="file" name="foto_ilustrativa" id="foto_ilustrativa">                                            
                                            </div>    
                                        </div>
                                                                                
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Nome:</label>
                                            <div class="col-sm-6">                                                
                                                <input type="text" value="<?php echo $linha['ds_titulo'] ?>" name="ds_titulo" placeholder="Nome do Artigo" class="form-control required" />
                                            </div>
                                        </div>  
                                        
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Data:</label>
                                            <div class="col-sm-6">                                                   
                                                <input type="text" value="<?php echo ConverteData($linha['dt_artigo']) ?>" name="dt_artigo" placeholder="Data Da Publicaçao" class="form-control required data" />
                                            </div>
                                        </div>  
                                        
                                         <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Segmento:</label>
                                            <div class="col-sm-6">
                                                <select name="segmento_id" class="form-control col-sm-6">
                                                    <option value=""> Escolha um Segmento </option>
                                                <?php $sql = mysql_query("SELECT id, nm_segmento FROM segmentos ORDER BY nm_segmento", $conexao);
                                                    while($result = mysql_fetch_array($sql)){
                                                        $selecionado = '';
                                                        if($result['id'] == $linha['segmento_id']){
                                                          $selecionado = 'selected';
                                                        }
                                                        echo "<OPTION VALUE='".$result['id']."'$selecionado>".$result['nm_segmento']."</OPTION>";
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Autor</label>
                                            <div class="col-sm-6">
                                                <select name="autor_id" class="form-control col-sm-6">
                                                    <option value=""> Escolha um utor </option>
                                                <?php $sql = mysql_query("SELECT id, nm_autor FROM autores ORDER BY nm_autor", $conexao);
                                                    while($result = mysql_fetch_array($sql)){
                                                        $selecionado = '';
                                                        if($result['id'] == $linha['autor_id']){
                                                          $selecionado = 'selected';
                                                        }
                                                        echo "<OPTION VALUE='".$result['id']."'$selecionado>".$result['nm_autor']."</OPTION>";
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Artigo:</label>
                                            <div class="col-sm-11"> 
                                            <textarea class="form-control ckeditor required" required name="ds_artigo"><?php echo $linha['ds_artigo'] ?></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?php echo $linha['id'] ?>" name="id" />
                                                                               
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Atualizar</button>
                                            <div class="btn-toolbar" style="float:right">
                                                <a href="javascript:;" class="btn-default btn" onclick="window.history.back()">Voltar</a>
                                            </div>
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
<script src="../public/js/jquery.maskMoney.js" type="text/javascript"></script>
<script src="../public/js/validacao/validaCPF.js" type="text/javascript"></script>
<script src="../public/js/validacao/validaEmail.js" type="text/javascript"></script>
<script src="../public/js/validacao/validaData.js" type="text/javascript"></script>
<script type='text/javascript' src='../public/js/alertas.js'></script>

<script src="../classes/ckeditor/ckeditor.js"> </script>

<script>
//region atualizar cliente
$('#atualizar-artigo').validate();

    CKEDITOR.replace('ds_artigo');
    function CKUpdate(){
        for(instance in CKEDITOR.instances){
            CKEDITOR.instances[instance].updateElement();
        }
        
    }

$("#atualizar-artigo").on('submit', function(e){                                               
    
    var isvalidate=$("#atualizar-artigo").valid();

    if(isvalidate){
        
        CKUpdate();
        $.ajax({
            url:"../controller/atualizar-artigo.php",
            type: "POST",
            data: new FormData( this ),
            processData: false,
            contentType: false,
            success : function(data){               
                if(data == "0")
                    alertaSucesso('Cadastrado com sucesso!', 'Sucesso', '../view/visualizar_artigo.php');
                else if (data == "1")
                    alertaErro("Você não tem permissão para executar está ação!", "Erro");                                                     
                else
                    alertaErro(data, "alert");
            }    
        });        
        
    }



    return false;
});
//endregion

</script>
<?php include "../includes/loading.php" ?>

