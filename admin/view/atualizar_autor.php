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
         $sql = "SELECT * FROM autores ".
                "WHERE id =".$_GET['id'].";";
        
        $resp = mysql_query($sql,$conexao);
        
        if(mysql_num_rows($resp) < 1)
            include "../avisos/autor-nao-encontrado.php";        

        $linha = mysql_fetch_array($resp);
        
        $redes = mysql_query("SELECT  rsa.id_rede_social, rsa.ds_link, rs.nm_rede_social ". 
                                "FROM rede_social_autor as rsa ".
                                "JOIN redes_sociais AS rs on rs.id = rsa.id_rede_social ".
                                "WHERE id_autor =".$_GET['id'].";", $conexao);
        
        //Pega Redes sociais
        $facebook = "";
        $twitter = "";
        $instagram = "";
        while ($rede = mysql_fetch_array($redes)) { 
             if($rede['nm_rede_social'] == "Facebook"){
                $facebook = $rede['ds_link'];                
            }
            if($rede['nm_rede_social'] == "Twitter"){
                $twitter = $rede['ds_link'];                
            }
            if($rede['nm_rede_social'] == "Instagram"){
                $instagram = $rede['ds_link'];                
            }
        }
                
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
                                <h4>Alterar dados do cliente: <?php echo strtoupper($linha['nm_autor'])?></h4>                            
                            </div>
                            <div class="panel-body collapse in">
                                <div id="example_wrapper" class="dataTables_wrapper" role="grid">
                                    <form action="#" id="atualizar-autor" name="atualizar-autor" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Foto:</label>                                            
                                            <div class="col-md-11">
                                                <?php    
                                                    $caminho = "../datafiles/autores/".$_GET['id'].""; 
                                                    if(!is_dir($caminho)){
                                                        $arquivo = "../datafiles/autores/user.jpg";
                                                    }else{                                                        
                                                        $arquivo = PegaImagemPasta($caminho); 
                                                    }
                                                ?>
                                                <img  src="<?php echo $arquivo?>" height="200px" width="200px" class="img-rounded"> 
                                                <input type="file" name="foto_autor" id="foto_autor">                                            
                                            </div>    
                                        </div>
                                        
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Nome:</label>
                                            <div class="col-sm-6">                                                
                                                <input value="<?php echo $linha['nm_autor']?>" type="text" name="nm_autor" placeholder="Nome do autor" class="form-control required" />
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Segmento:</label>
                                            <div class="col-sm-6">
                                                <select name="id_segmento" class="form-control col-sm-6">
                                                    <option value=""> Escolha um Segmento </option>
                                                <?php $sql = mysql_query("SELECT id, nm_segmento FROM segmentos ORDER BY nm_segmento", $conexao);
                                                    while($result = mysql_fetch_array($sql)){
                                                        $selecionado = '';
                                                        if($result['id'] == $linha['id_segmento']){
                                                          $selecionado = 'selected';
                                                        }
                                                        echo "<OPTION VALUE='".$result['id']."'$selecionado>".$result['nm_segmento']."</OPTION>";
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Frase:</label>
                                            <div class="col-sm-6">                                                
                                                <textarea rows="4" cols="10" name="ds_frase" placeholder="Digite uma frase para o perfil do Autor" class="form-control"/><?php echo $linha['ds_frase']?></textarea>
                                            </div>                                               
                                        </div> 
                                        <div class="form-group col-sm-12">                                            
                                            <label class="col-sm-1 control-label"></label>
                                                <div class="col-sm-4">                                                
                                                <input value="<?php echo $linha['ds_frase_autor'] ?>" type="text" name="ds_frase_autor" placeholder="Autor da frase" class="form-control " />
                                            </div>
                                        </div> 
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Facebook:</label>
                                            <div class="col-sm-6"> 
                                                <input value="<?php echo $facebook;?>"type="text" name="ds_link_facebook" placeholder="Link da pagina do Facebook" class="form-control " />
                                            </div>
                                        </div>  
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Twitter:</label>
                                            <div class="col-sm-6"> 
                                                <input value="<?php echo $twitter;?>" type="text" name="ds_link_twitter" placeholder="Link da pagina do Twitter" class="form-control" />
                                            </div>
                                        </div>  
                                        <div class="form-group col-sm-12">
                                            <label class="col-sm-1 control-label">Instagram:</label>
                                            <div class="col-sm-6">  
                                                <input value="<?php echo $instagram;?>" type="text" name="ds_link_instagram" placeholder="Link da pagina do Instagram" class="form-control" />
                                            </div>
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
<script type='text/javascript' src='../public/js/alertas.js'></script>


<script>
//region atualizar cliente
$('#atualizar-autor').validate();

$("#atualizar-autor").on('submit', function(e){                                               

    var isvalidate=$("#atualizar-autor").valid();

    if(isvalidate){
        
        $.ajax({
            url:"../controller/atualizar-autor.php",
            type: "POST",
            data: new FormData( this ),
            processData: false,
            contentType: false,
            success : function(data){               
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
//endregion

</script>
<?php include "../includes/loading.php" ?>

