<?php
    
    $codigoSeg = base64_decode($_GET['seg']);
    $sql_editoria =     "SELECT art.id, ds_titulo, dt_artigo, ds_artigo, nr_visualizacoes, nm_segmento, seg.id as idSeg "
                       ."FROM ARTIGOS AS art "
                       ."JOIN SEGMENTOS AS seg ON art.segmento_id = seg.id "
                       ."WHERE seg.id = ".$codigoSeg." LIMIT 5";  
    
    $artigos = mysql_query($sql_editoria,$conexao);
    
    $sql_nm = "Select nm_segmento from segmentos where id = ".$codigoSeg;
    $nm_artigo = mysql_fetch_assoc(mysql_query($sql_nm, $conexao)); 
    
?>




<div class="page">
	<div class="page_header clearfix page_margin_top">
		<div class="page_header_left">
			<h1 class="page_title"><?php echo $nm_artigo['nm_segmento']?></h1>
                        
		</div>
		<div class="page_header_right">
			<ul class="bread_crumb">
				<li>
					<a title="Home" href="?page=home">
						HOME
					</a>
				</li>
				<li class="separator icon_small_arrow right_gray">
					&nbsp;
				</li>
				
			</ul>
		</div>
	</div>
	<div class="page_layout clearfix">
		<div class="divider_block clearfix">
			<hr class="divider first">
			<hr class="divider subheader_arrow">
			<hr class="divider last">
		</div>
		<div class="row">
			<div class="column column_2_3">
				<div class="row">
					<ul class="blog big">                                            
                                            <?php
                                                while($artigo = mysql_fetch_array($artigos)){
                                                    $caminho = "admin/datafiles/artigos/".$artigo['id']; 
                                                    if(!is_dir($caminho)){
                                                        $arquivo = "admin/datafiles/artigos/noImage.png";
                                                    }else{                                                        
                                                        $arquivo = PegaImagemPasta($caminho); 
                                                    }
                                            ?>
						<li class="post">
							<a href="?page=post" title="<?php echo $artigo['ds_titulo'] ?>">
                                                            <img src='<?php echo $arquivo?>' alt='img'>
							</a>
							<div class="post_content">
								<h2 class="with_number">
									<a href="click-bcmdigital.php?t=<?php echo base64_encode('ar');?>&idArtigo=<?php echo base64_encode($artigo['id']);?>" title="<?php echo $artigo['ds_titulo'] ?>"><?php echo $artigo['ds_titulo'] ?></a>
									<a class="comments_number"  title="<?php echo $artigo['nr_visualizacoes'] ?> Views"><?php echo $artigo['nr_visualizacoes'] ?><span class="arrow_comments"></span></a>
								</h2>
								<ul class="post_details">
									
									<li class="date">
										<?php echo ConverteData($artigo['dt_artigo']) ?>
									</li>
								</ul>
                                                            	<a class="read_more" href="?page=post" title="LEIA MAIS"><span class="arrow"></span><span>LEIA MAIS</span></a>
							</div>
                                                </li> <?php } ?>
                                                                                         

					</ul>
				</div>
				<ul class="pagination clearfix page_margin_top_section">
					<li class="left">
						<a href="#" title="">&nbsp;</a>
					</li>
					<li class="selected">
						<a href="#" title="">
							1
						</a>
					</li>
					<li>
						<a href="#" title="">
							2
						</a>
					</li>
					<li>
						<a href="#" title="">
							3
						</a>
					</li>
					<li class="right">
						<a href="#" title="">&nbsp;</a>
					</li>
				</ul>
			</div>
                        <?php include 'siderBar.php';?>

		</div>
	</div>
</div>