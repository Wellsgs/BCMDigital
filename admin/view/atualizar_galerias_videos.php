<?php 
    #region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion 
    include ("../includes/validacoes-acesso.php"); 

    LogSistema(
            $_SERVER ['REQUEST_URI'], 
            "Nestá pagina é possível fazer a atualização de uma galeria video", 
            "",
            $conexao
        );
    
    $flag= true;
    if(!isset($_GET['id']) || !is_numeric($_GET['id']))
        $flag = false;
    
    if($flag){
        $resp = mysql_query("SELECT * FROM galeriavideos WHERE id=".$_GET['id']." LIMIT 1;", $conexao);

        if(mysql_num_rows($resp) < 1)
            include "../avisos/galeria-nao-encontrado.php";        

        $linha = mysql_fetch_array($resp);
        
        include "../controller/verifica_nivel_de_acesso.php";

    }
?>

<?php include "header.php" ?>

<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li class='active'><a href="../view/inicio.php">Início</a></li>
            </ol>
            <h1>Alteração de Galeria Vídeo</h1>            
        </div>
        <?php 
            if(!$flag)
                include "../avisos/galeria-nao-encontrado.php";
        ?>
        <div class="main">
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>Alterar dados da galeria vídeo: <?php echo strtoupper($linha['nm_galeria'])?></h4>                            
                            </div>
                            <div class="panel-body collapse in">
                                <div id="example_wrapper" class="dataTables_wrapper" role="grid">
                                    <form action="#" id="atualizar-galeria-video" name="atualizar-galeria-video" method="post" class="form-horizontal">
                                        <div class="col-md-12">
                                            <label>Nome da galeria:</label>
                                            <input value="<?php echo strtolower($linha['nm_galeria'])?>" type="text" name="nm_galeria" placeholder="Nome da galeria" class="form-control required" />
                                        </div>

                                        <input type="hidden" value="<?php echo $linha['id'] ?>" name="id" />

                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>

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


<script>
//region atualizar galeria video
$('#atualizar-galeria-video').validate();

$("#atualizar-galeria-video button").click(function(){                                                 
    
    var isvalidate=$("#atualizar-galeria-video").valid();
    if(isvalidate){
        $.ajax(
            {               
                type:"POST",
                url:"../controller/atualizar-galeria-video.php",
                data:$("#atualizar-galeria-video").serialize(),
                success : function(data){
                    if(data == "0")
                        alertaSucesso('Alterado com sucesso!', 'Sucesso', '../view/visualizar_galerias_videos.php');
                    else if (data == "1")
                        alertaErro("Você não tem permissão para executar está ação!", "Erro");                                                     
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

