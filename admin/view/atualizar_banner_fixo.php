<?php 
    #region Iniciando Sessão
    if (!isset($_SESSION)) {
        session_start();
    };
    #endregion 
    include ("../includes/validacoes-acesso.php"); 
    include ("../public/util/funcoes.php");

    LogSistema(
            $_SERVER ['REQUEST_URI'], 
            "Nestá pagina é possível fazer a atualização de um banner fixo", 
            "",
            $conexao
        );
    
    $flag= true;
    if(!isset($_GET['id']) || !is_numeric($_GET['id']))
        $flag = false;
    
    if($flag){
        $resp = mysql_query("SELECT * FROM banner_fixo WHERE id=".$_GET['id']." LIMIT 1;", $conexao);

        if(mysql_num_rows($resp) < 1)
            include "../avisos/banner-fixo-nao-encontrado.php";        

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
            <h1>Alteração de Banner Fixo</h1>            
        </div>
        <?php 
            if(!$flag)
                include "../avisos/banner-fixo-nao-encontrado.php";
        ?>
        <div class="main">
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>Alterar dados do banner fixo: <?php echo ($linha['nm_empresa'])?></h4>                            
                            </div>
                            <div class="panel-body collapse in">
                                <div id="example_wrapper" class="dataTables_wrapper" role="grid">
                                    <form action="#" id="atualizar-banner-fixo" name="atualizar-banner-fixo" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <label>Nome da Empresa:</label>
                                            <input type="text" name="nm_empresa" placeholder="Nome da Empresa" class="form-control required" value="<?php echo $linha['nm_empresa']?>" />
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
                                                        $selecionado = '';
                                                        if($result['id'] == $linha['cliente_id']){
                                                          $selecionado = 'selected';
                                                        }
                                                        echo "<OPTION VALUE='".$result['id']."'$selecionado>".$result['nm_cliente']."</OPTION>";
                                                    }
                                                ?>
                                            </select> 
                                        </div>
                                        
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-12">
                                            <label>Data de Início:</label>
                                            <input type="text" name="dt_inicio" placeholder="Data de Início" class="form-control required data" value="<?php echo ConverteData($linha['dt_inicio']);?>" />
                                        </div> 
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-12">
                                            <label>Data de Expiração:</label>
                                            <input type="text" name="dt_expiracao" placeholder="Data de Expiração" class="form-control required data" value="<?php echo ConverteData($linha['dt_expiracao']);?>" />
                                        </div> 
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-12">
                                            <label>Link (sem http://):</label>
                                            <input type="text" name="ds_link" placeholder="Link (sem http://)" class="form-control required" value="<?php echo $linha['ds_link'];?>" />
                                        </div> 
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        
                                        <div class="checkbox-inline col-md-12">
                                          Exclusivo na Home?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>
                                          <?php                                             
                                            $checado = ($linha['ic_home'] == 0) ? "" : "checked";                                           
                                          ?>
                                          <input type="checkbox" name="ic_home" value="sim" <?php echo $checado;?> >Sim</label>
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
                                                        $selecionado = '';
                                                        if($result['id'] == $linha['segmento_id']){
                                                          $selecionado = 'selected';
                                                        }
                                                        echo "<OPTION VALUE='".$result['id']."'$selecionado>".$result['nm_segmento']."</OPTION>";
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
                                                        $selecionado = '';
                                                        if($result['id'] == $linha['tipo_id']){
                                                          $selecionado = 'selected';
                                                        }
                                                        echo "<OPTION VALUE='".$result['id']."'$selecionado>".$result['nm_tipo']."</OPTION>";
                                                    }
                                                ?>
                                            </select> 
                                        </div>    
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-12">
                                            <label>Artigo:</label>
                                            <select name="artigo_id" class="form-control">
                                                <option value="0"> Escolha um artigo </option>
                                                <?php $sql = mysql_query("SELECT id, ds_titulo FROM artigos WHERE ds_titulo <> ''  ORDER BY ds_titulo", $conexao);
                                                    while($result = mysql_fetch_array($sql)){
                                                        $selecionado = '';
                                                        if($result['id'] == $linha['artigo_id']){
                                                          $selecionado = 'selected';
                                                        }
                                                        echo "<OPTION VALUE='".$result['id']."'$selecionado>".$result['ds_titulo']."</OPTION>";
                                                    }
                                                ?>
                                            </select> 
                                        </div>
                                        <div class="col-md-12">
                                            <label>Foto Ilustrativa:</label>               
                                        </div>
                                        <div class="col-md-12">
                                            <?php 
                                                $caminho = "../datafiles/banner_fixo/".$linha['id'].""; 
                                                $arquivo = PegaImagemPasta($caminho);               
                                            ?>
                                            <img src="<?php echo $arquivo;?>">         
                                        </div>
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-12">
                                            <label>Foto Nova Imagem Ilustrativa:</label>
                                            <input type="file" class="" name="foto_ilustrativa" id="foto_ilustrativa">                                            
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
//region atualizar banner
$('#atualizar-banner-fixo').validate();

$("#atualizar-banner-fixo").on('submit', function(e){                                               

    var isvalidate=$("#atualizar-banner-fixo").valid();

    if(isvalidate){
        
        $.ajax({
            url:"../controller/atualizar-banner-fixo.php",
            type: "POST",
            data: new FormData( this ),
            processData: false,
            contentType: false,
            success : function(data){
                if(data == "0")
                    alertaSucesso('Cadastrado com sucesso!', 'Sucesso', '../view/visualizar_banner_fixo.php');
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

